<%@page import="Models.Programme"%>
<%@page import="java.util.Vector"%>
<%@include file="header.jsp"%>

<h2>Programme associé à la demande</h2>
<div class="main">
    <table class="table table-striped">
        
            <%
                Programme programme = (Programme)session.getAttribute("programme");
                if(programme.getIntitule() != null){
                    %>
                    <thead>
                        <tr>
                            <th>Nom du programme</th>
                            <th>Desciption</th>
                        </tr>
                    </thead>
                    <%
                    out.print("<tr>");
                    out.print("<td>"+ programme.getIntitule() + "</td>");
                    out.print("<td>"+ programme.getDescription() + "</td>");
                    out.print("</tr>");
                }else{
                    out.print("<div class=\"alert alert-info\" role=\"alert\">");
                    out.print("Aucun résultat trouvé");
                    out.print("</div>");
                }
                %>
    </table>
</div>

<%@include file="footer.jsp"%>