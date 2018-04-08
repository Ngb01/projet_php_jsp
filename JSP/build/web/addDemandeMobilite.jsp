<%@page import="Models.Diplome"%>
<%@page import="Models.Etudiant"%>
<%@page import="java.util.Vector"%>
<%@include file="header.jsp"%>

<h2>Ajouter une demande de mobilit�</h2>
<form action="DemandesMobilitesController" method="post">
    <label>�tudiant associ� � la demande</label>
    <select class="form-control" name="etudiant">
        <%
        //Affichage la liste des �tudiants
        Vector listeEtudiants = Etudiant.getEtudiants();
        if(listeEtudiants != null){
            for (int i = 0; i < listeEtudiants.size(); i++) {
                Etudiant etudiant = (Etudiant) listeEtudiants.get(i);
                out.print("<option value="+etudiant.getNumEtudiant()+">"+etudiant.getPrenom()+" "+etudiant.getNom()+"</option>");
            }
        }
        %>
    </select>
    <label>Dipl�me local pr�vu</label>
    <select class="form-control" name="diplome">
        <%
        //Affichage la liste des �tudiants
        Vector listeDiplomes = Diplome.getDiplomes();
        if(listeDiplomes != null){
            for (int i = 0; i < listeDiplomes.size(); i++) {
                Diplome diplome = (Diplome) listeDiplomes.get(i);
                out.print("<option value="+diplome.getCode()+">"+diplome.getIntitule()+"</option>");
            }
        }
        %>
    </select>
    <label>Date de d�pot de la demande</label>
    <input class="form-control" type="date" name="depot"><br>
    <label>�tat de la demande</label>
    <select class="form-control" name="etat">
        <option value="Nouveau" selected="selected">Nouveau</option>
        <option value="En attente">En attente</option>
        <option value="Accordee">Accord�e</option>
    </select>
    <input type="hidden" name="action" value="add">
    <input class="btn btn-primary" type="submit" value="Ajouter la demande">
</form>
    

<%@include file="footer.jsp"%>
