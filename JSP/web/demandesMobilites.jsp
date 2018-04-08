<%@page import="Models.Diplome"%>
<%@page import="Models.Universite"%>
<%@page import="Models.Etudiant"%>
<%@page import="java.util.Vector"%>
<%@include file="header.jsp"%>

<form action="DemandesMobilitesController" method="post">
    <input type="hidden" name="action" value="addform">
    <input type="submit" class="btn btn-secondary" value="Ajouter une demande de mobilité">
</form>
<h2>Rechercher des demandes mobilités</h2>
<form action="DemandesMobilitesController" method="post">
    <label>Consulter par étudiant</label>
    <select class="form-control mobilite" name="etudiant">
        <%
        //Affichage la liste des étudiants
        Vector listeEtudiants = Etudiant.getEtudiants();
        if(listeEtudiants != null){
            for (int i = 0; i < listeEtudiants.size(); i++) {
                Etudiant etudiant = (Etudiant) listeEtudiants.get(i);
                out.print("<option value="+etudiant.getNumEtudiant()+">"+etudiant.getPrenom()+" "+etudiant.getNom()+"</option>");
            }
        }
        %>
    </select>
    <input type="hidden" name="action" value="paretudiant">
    <input type="submit" class="btn btn-primary" value="Rechercher">
</form>

<form action="DemandesMobilitesController" method="post">
    <label>Consulter par université</label>
    <select class="form-control mobilite" name="universite">
        <%
        //Affichage la liste des étudiants
        Vector listeUniversites = Universite.getUniversites();
        if(listeUniversites != null){
            for (int i = 0; i < listeUniversites.size(); i++) {
                Universite universite = (Universite) listeUniversites.get(i);
                out.print("<option value="+universite.getNom()+">"+universite.getNom()+"</option>");
            }
        }
        %>
    </select>
    <input type="hidden" name="action" value="paruniversite">
    <input type="submit" class="btn btn-primary" value="Rechercher">
</form>
    
<form action="DemandesMobilitesController" method="post">
    <label>Consulter par diplôme</label>
    <select class="form-control mobilite" name="diplome">
        <%
        //Affichage la liste des étudiants
        Vector listeDiplomes = Diplome.getDiplomes();
        if(listeDiplomes != null){
            for (int i = 0; i < listeDiplomes.size(); i++) {
                Diplome diplome = (Diplome) listeDiplomes.get(i);
                out.print("<option value="+diplome.getCode()+">"+diplome.getIntitule()+"</option>");
            }
        }
        %>
    </select>
    <input type="hidden" name="action" value="pardiplome">
    <input type="submit" class="btn btn-primary" value="Rechercher">
</form>
    

<%@include file="footer.jsp"%>
