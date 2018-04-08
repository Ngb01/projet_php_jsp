<%@page import="Models.DemandeMobilite"%>
<%@page import="Models.Contrat"%>
<%@page import="java.util.Vector"%>
<%@include file="header.jsp"%>

<h2>Ajouter une demande financière</h2>
<form action="DemandesFinancieresController" method="post">
    <label>Contrat associé à la demande</label>
    <select class="form-control" name="contrat">
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
    <label>Date de dépot de la demande</label>
    <input class="form-control" type="date" name="depot"><br>
    <label>État de la demande</label>
    <select class="form-control" name="etat">
        <option value="Nouveau" selected="selected">Nouveau</option>
        <option value="En attente">En attente</option>
        <option value="Accordee">Accordée</option>
    </select>
    <label>Montant accordé</label>
    <input class="form-control" type="number" name="montant" min="1">
    <input type="hidden" name="action" value="add">
    <input class="btn btn-primary" type="submit" value="Ajouter la demande">
</form>
    

<%@include file="footer.jsp"%>
