<%@page import="Models.DemandeMobilite"%>
<%@page import="Models.DemandeFinanciere"%>
<%@page import="Models.Contrat"%>
<%@page import="java.util.Vector"%>
<%@include file="header.jsp"%>

<h2>Mettre à jour une demande de mobilité</h2>
<form action="DemandesMobilitesController" method="post">
    <label>Contrat associé à la demande</label>
    <select class="form-control" name="etudiant">
        <%
        //Affichage la liste des contrats
        Vector listeContrats = Contrat.getContrats();
        DemandeFinanciere demande = (DemandeFinanciere)session.getAttribute("maj");
        if(listeContrats != null){
            for (int i = 0; i < listeContrats.size(); i++) {
                Contrat contrat = (Contrat) listeContrats.get(i);
                if(contrat.getIdcontrat() == demande.getContrat()){
                    out.print("<option value="+contrat.getIdcontrat()+" selected=\"selected\">"+contrat.getProgramme()+" / "+DemandeMobilite.getDepot(contrat.getMobilite())+"</option>");
                }else{
                    out.print("<option value="+contrat.getIdcontrat()+">"+contrat.getProgramme()+" / "+DemandeMobilite.getDepot(contrat.getMobilite())+"</option>");
                }
            }
        }
        %>
    </select>
    <label>Date de dépot de la demande</label>
    <input class="form-control" type="date" name="depot" value="<%=demande.getDepot()%>"><br>
    <label>État de la demande</label>
    <select class="form-control" name="etat">
        <%
            
            System.out.print(demande.getEtat());
            if(demande.getEtat().equalsIgnoreCase("Nouveau")){
                out.print("<option value=\"Nouveau\" selected=\"selected\">Nouveau</option>");
                out.print("<option value=\"En attente\">En attente</option>");
                out.print("<option value=\"Accordée\">Accordée</option>");
            }else if(demande.getEtat().equalsIgnoreCase("En attente")){
                out.print("<option value=\"Nouveau\">Nouveau</option>");
                out.print("<option value=\"En attente\" selected=\"selected\">En attente</option>");
                out.print("<option value=\"Accordée\">Accordée</option>");
            }else{
                out.print("<option value=\"Nouveau\">Nouveau</option>");
                out.print("<option value=\"En attente\">En attente</option>");
                out.print("<option value=\"Accordée\" selected=\"selected\">Accordée</option>");
            }
        %>
    </select>
    <label>Montant accordé</label>
    <input class="form-control" type="number" name="montant" min="1" value="<%=demande.getMontant()%>">
    <input type="hidden" name="action" value="update">
    <input class="btn btn-primary" type="submit" value="Mettre à jour la demande">
</form>
    

<%@include file="footer.jsp"%>
