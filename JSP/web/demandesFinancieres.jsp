<%@page import="Models.Programme"%>
<%@page import="Models.DemandeMobilite"%>
<%@page import="Models.Contrat"%>
<%@page import="java.util.Vector"%>
<%@include file="header.jsp"%>

<form action="DemandesFinancieresController" method="post">
    <input type="hidden" name="action" value="addform">
    <input type="submit" value="Ajouter une demande financière">
</form>
<h2>Rechercher des demandes financieres</h2>
<form action="DemandesFinancieresController" method="post">
    <label>Consulter par contrat</label>
    <select name="contrat">
        <%
        //Affichage de la liste des contrats
        Vector listeContrats = Contrat.getContrats();
        if(listeContrats != null){
            for (int i = 0; i < listeContrats.size(); i++) {
                Contrat contrat = (Contrat) listeContrats.get(i);
                out.print("<option value="+contrat.getIdcontrat()+">"+contrat.getProgramme()+" / "+DemandeMobilite.getDepot(contrat.getMobilite())+"</option>");
            }
        }
        %>
    </select>
    <input type="hidden" name="action" value="parcontrat">
    <input type="submit" value="Rechercher">
</form>
<form action="DemandesFinancieresController" method="post">
    <label>Consulter par programme</label>
    <select name="programme">
        <%
        //Affichage de la liste des programmes
        Vector listeProgrammes = Programme.getProgrammes();
        if(listeProgrammes != null){
            for (int i = 0; i < listeProgrammes.size(); i++) {
                Programme programme = (Programme) listeProgrammes.get(i);
                out.print("<option value="+programme.getIntitule()+">"+programme.getIntitule()+"</option>");
            }
        }
        %>
    </select>
    <input type="hidden" name="action" value="parprogramme">
    <input type="submit" value="Rechercher">
</form>
    

<%@include file="footer.jsp"%>
