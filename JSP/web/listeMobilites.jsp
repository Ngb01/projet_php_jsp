<%@page import="Models.Diplome"%>
<%@page import="Models.Etudiant"%>
<%@page import="Models.DemandeMobilite"%>
<%@page import="java.util.Vector"%>
<%@include file="header.jsp"%>

<h2>R�sultat de la recherche de demandes de mobilit�s</h2>
<div class="main">
    <table class="table table-striped">
        
            <%
                Vector listeMobilites = (Vector)session.getAttribute("listeMobilites");
                if(listeMobilites != null && listeMobilites.size() != 0){
                    %>
                    <thead>
                        <tr>
                            <th>Etudiant</th>
                            <th>Diplome pr�vu</th>
                            <th>Date de d�pot</th>
                            <th>�tat</th>
                        </tr>
                    </thead>
                    <%
                    for(int i=0; i < listeMobilites.size(); i++){
                        DemandeMobilite mobilite = (DemandeMobilite) listeMobilites.get(i);
                        session.setAttribute("mobilite", mobilite.getReference());
                        out.print("<tr>");
                        out.print("<td>"+ Etudiant.getName(mobilite.getEtudiant()) + "</td>");
                        out.print("<td>"+ Diplome.getIntitule(mobilite.getDiplome()) + "</td>");
                        out.print("<td>"+ mobilite.getDepot() + "</td>");
                        out.print("<td>"+ mobilite.getEtat() + "</td>");
                        out.print("<td><form action=\"DemandesMobilitesController\" method=\"post\">"+
                                    "<input type=\"hidden\" name=\"action\" value=\"programme\">"+
                                    "<input type=\"submit\" value=\"Programme associ�\">"+
                                "</form></td>");
                        out.print("<td><form action=\"DemandesMobilitesController\" method=\"post\">"+
                                    "<input type=\"hidden\" name=\"action\" value=\"contrat\">"+
                                    "<input type=\"submit\" value=\"Contrat associ�\">"+
                                "</form></td>");
                        out.print("<td><form action=\"DemandesMobilitesController\" method=\"post\">"+
                                    "<input type=\"hidden\" name=\"action\" value=\"updateform\">"+
                                    "<input type=\"submit\" value=\"Modifier\">"+
                                "</form></td>");
                        out.print("<td><form action=\"DemandesMobilitesController\" method=\"post\">"+
                                    "<input type=\"hidden\" name=\"action\" value=\"delete\">"+
                                    "<input type=\"submit\" value=\"Supprimer\">"+
                                "</form></td>");
                        out.print("</tr>");
                    }
                }else{
                    out.print("<div class=\"alert alert-info\" role=\"alert\">");
                    out.print("Aucun r�sultat trouv�");
                    out.print("</div>");
                }
                %>
    </table>
</div>

<%@include file="footer.jsp"%>