<%@page import="Models.Contrat"%>
<%@page import="Models.DemandeMobilite"%>
<%@page import="Models.DemandeFinanciere"%>
<%@page import="java.util.Vector"%>
<%@include file="header.jsp"%>

<h2>Résultat de la recherche de demandes financières</h2>
<div class="main">
    <table class="table table-striped">
        
            <%
                Vector listeFinanciere = (Vector)session.getAttribute("listeFinanciere");
                if(listeFinanciere != null && listeFinanciere.size() != 0){
                    %>
                    <thead>
                        <tr>
                            <th>Contrat</th>
                            <th>Date de dépot</th>
                            <th>Etat</th>
                            <th>Montant accordé</th>
                        </tr>
                    </thead>
                    <%
                    for(int i=0; i < listeFinanciere.size(); i++){
                        DemandeFinanciere financiere = (DemandeFinanciere) listeFinanciere.get(i);
                        session.setAttribute("financiere", financiere.getReference());
                        out.print("<tr>");
                        out.print("<td>"+ Contrat.getProgramme(financiere.getContrat()) + " / "+ DemandeMobilite.getDepot(Contrat.getMobilite(financiere.getContrat()))+ "</td>");
                        out.print("<td>"+ financiere.getDepot() + "</td>");
                        out.print("<td>"+ financiere.getEtat() + "</td>");
                        out.print("<td>"+ financiere.getMontant() + " euros</td>");
                        out.print("<td><form action=\"DemandesFinancieresController\" method=\"post\">"+
                                    "<input type=\"hidden\" name=\"action\" value=\"programme\">"+
                                    "<input type=\"submit\" value=\"Programme associé\">"+
                                "</form></td>");
                        out.print("<td><form action=\"DemandesFinancieresController\" method=\"post\">"+
                                    "<input type=\"hidden\" name=\"action\" value=\"contrat\">"+
                                    "<input type=\"submit\" value=\"Contrat associé\">"+
                                "</form></td>");
                        out.print("<td><form action=\"DemandesFinancieresController\" method=\"post\">"+
                                    "<input type=\"hidden\" name=\"action\" value=\"updateform\">"+
                                    "<input type=\"submit\" value=\"Modifier\">"+
                                "</form></td>");
                        out.print("<td><form action=\"DemandesFinancieresController\" method=\"post\">"+
                                    "<input type=\"hidden\" name=\"action\" value=\"delete\">"+
                                    "<input type=\"submit\" value=\"Supprimer\">"+
                                "</form></td>");
                        out.print("</tr>");
                    }
                }else{
                    out.print("<div class=\"alert alert-info\" role=\"alert\">");
                    out.print("Aucun résultat trouvé");
                    out.print("</div>");
                }
                %>
    </table>
</div>

<%@include file="footer.jsp"%>