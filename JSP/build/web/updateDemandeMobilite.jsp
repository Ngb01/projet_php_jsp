<%@page import="Models.DemandeMobilite"%>
<%@page import="Models.Diplome"%>
<%@page import="Models.Etudiant"%>
<%@page import="java.util.Vector"%>
<%@include file="header.jsp"%>

<h2>Mettre � jour une demande de mobilit�</h2>
<form action="DemandesMobilitesController" method="post">
    <label>�tudiant associ� � la demande</label>
    <select class="form-control" name="etudiant">
        <%
        //Affichage la liste des �tudiants
        Vector listeEtudiants = Etudiant.getEtudiants();
        DemandeMobilite demande = (DemandeMobilite)session.getAttribute("maj");
        if(listeEtudiants != null){
            for (int i = 0; i < listeEtudiants.size(); i++) {
                Etudiant etudiant = (Etudiant) listeEtudiants.get(i);
                if(etudiant.getNumEtudiant() == demande.getEtudiant()){
                    out.print("<option value="+etudiant.getNumEtudiant()+" selected=\"selected\">"+etudiant.getPrenom()+" "+etudiant.getNom()+"</option>");
                }else{
                    out.print("<option value="+etudiant.getNumEtudiant()+">"+etudiant.getPrenom()+" "+etudiant.getNom()+"</option>");
                }
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
                if(diplome.getCode() == demande.getDiplome()){
                    out.print("<option value="+diplome.getCode()+" selected=\"selected\">"+diplome.getIntitule()+"</option>");
                }else{
                    out.print("<option value="+diplome.getCode()+">"+diplome.getIntitule()+"</option>");
                }
            }
        }
        %>
    </select>
    <label>Date de d�pot de la demande</label>
    <input class="form-control" type="date" name="depot" value="<%=demande.getDepot()%>"><br>
    <label>�tat de la demande</label>
    <select class="form-control" name="etat">
        <%
            if(demande.getEtat().equalsIgnoreCase("Nouveau")){
                out.print("<option value=\"Nouveau\" selected=\"selected\">Nouveau</option>");
                out.print("<option value=\"En attente\">En attente</option>");
                out.print("<option value=\"Accord�e\">Accord�e</option>");
            }else if(demande.getEtat().equalsIgnoreCase("En attente")){
                out.print("<option value=\"Nouveau\">Nouveau</option>");
                out.print("<option value=\"En attente\" selected=\"selected\">En attente</option>");
                out.print("<option value=\"Accord�e\">Accord�e</option>");
            }else{
                out.print("<option value=\"Nouveau\">Nouveau</option>");
                out.print("<option value=\"En attente\">En attente</option>");
                out.print("<option value=\"Accord�e\" selected=\"selected\">Accord�e</option>");
            }
        %>
    </select>
    <input type="hidden" name="action" value="update">
    <input class="btn btn-primary" type="submit" value="Mettre � jour la demande">
</form>
    

<%@include file="footer.jsp"%>
