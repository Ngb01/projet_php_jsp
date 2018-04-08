<%@page import="Models.Contrat"%>
<%@page import="Models.Diplome"%>
<%@page import="Models.DemandeMobilite"%>
<%@page import="java.util.Vector"%>
<%@include file="header.jsp"%>

<h2>Contrats associés à la demande</h2>
<div class="main">
    <table class="table table-striped">
        
            <%
                Vector listeContrats = (Vector)session.getAttribute("listeContrats");
                if(listeContrats != null && listeContrats.size() != 0){
                    %>
                    <thead>
                        <tr>
                            <th>Diplome prévu</th>
                            <th>Date dépot de mobilité</th>
                            <th>Programme</th>
                            <th>Duree</th>
                            <th>Etat du contrat</th>
                        </tr>
                    </thead>
                    <%
                    for(int i=0; i < listeContrats.size(); i++){
                        Contrat contrat = (Contrat) listeContrats.get(i);
                        out.print("<tr>");
                        out.print("<td>"+ Diplome.getIntitule(contrat.getDiplome()) + "</td>");
                        out.print("<td>"+ DemandeMobilite.getDepot(contrat.getMobilite()) + "</td>");
                        out.print("<td>"+ contrat.getProgramme() + "</td>");
                        out.print("<td>"+ contrat.getDuree() + " jours</td>");
                        out.print("<td>"+ contrat.getEtat() + "</td>");
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