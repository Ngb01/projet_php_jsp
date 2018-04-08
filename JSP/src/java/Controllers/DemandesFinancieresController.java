/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package Controllers;

import Models.Contrat;
import Models.DemandeFinanciere;
import Models.DemandeMobilite;
import Models.Programme;
import java.io.IOException;
import java.sql.SQLException;
import java.util.Vector;
import java.util.logging.Level;
import java.util.logging.Logger;
import javax.servlet.RequestDispatcher;
import javax.servlet.ServletException;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;
import javax.servlet.http.HttpSession;


public class DemandesFinancieresController extends HttpServlet {

    /**
     * Processes requests for both HTTP <code>GET</code> and <code>POST</code>
     * methods.
     *
     * @param request servlet request
     * @param response servlet response
     * @throws ServletException if a servlet-specific error occurs
     * @throws IOException if an I/O error occurs
     */
    protected void processRequest(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException, SQLException {
        
        //Récupérer la session en cours
        HttpSession session = request.getSession();
        
        //Initialiser le dispatcher de requêtes
        RequestDispatcher rd = null;
        
        //Vérification de session
        if(session == null){
            rd = request.getRequestDispatcher("/error.html");
            rd.forward(request,response);
        }else{ 
            //Si il n'y a pas d'erreur, on route
            //On récupère l'action envoyé par la vue
            String action = request.getParameter("action");
            
            // Consulter les des demandes d emobilités pour un étudiant
            if(action.equalsIgnoreCase("parcontrat")){
                int contrat = Integer.parseInt(request.getParameter("contrat"));
                //Affichage la liste des demandes financières pour le contrat donné
                Vector<DemandeFinanciere> listeFinanciere = DemandeFinanciere.getFinanciereContrat(contrat);
                session.setAttribute("listeFinanciere", listeFinanciere);
                rd = request.getRequestDispatcher("/listeFinanciere.jsp");
                rd.forward(request,response);
            
            }else if(action.equalsIgnoreCase("parprogramme")){
                String programme = request.getParameter("programme");
                //Affichage la liste des demandes de mobilites pour l'universite donnée
                Vector<DemandeFinanciere> listeFinanciere = DemandeFinanciere.getFinanciereProgramme(programme);
                session.setAttribute("listeFinanciere", listeFinanciere);
                rd = request.getRequestDispatcher("/listeFinanciere.jsp");
                rd.forward(request,response);
                
            }else if(action.equalsIgnoreCase("programme")){
                int referenceFinanciere = (Integer)session.getAttribute("financiere");
                //Afficher le programme lié à la demande de mobilité
                Programme programme = Programme.getProgrammeFinanciere(referenceFinanciere);
                session.setAttribute("programme", programme);
                rd = request.getRequestDispatcher("/programme.jsp");
                rd.forward(request,response);
                
            }else if(action.equalsIgnoreCase("contrat")){
                int referenceFinanciere = (Integer)session.getAttribute("financiere");
                //Affichage la liste des demandes de mobilites pour le diplome donné
                Vector<Contrat> listeContrat = Contrat.getContratsFinanciere(referenceFinanciere);
                session.setAttribute("listeContrats", listeContrat);
                rd = request.getRequestDispatcher("/contrat.jsp");
                rd.forward(request,response);
                
            // Renvoi sur le formulaire d'ajout d'une demande financière
            }else if(action.equalsIgnoreCase("addform")){
                rd = request.getRequestDispatcher("/addDemandeFinanciere.jsp");
                rd.forward(request,response);
                
            // Renvoi sur le formulaire de modification d'une demande financière
            }else if(action.equalsIgnoreCase("updateform")){
                int referenceFinanciere = (Integer)session.getAttribute("financiere");
                //Récupération des données de la demande qui va être mise à jour
                DemandeFinanciere maj = DemandeFinanciere.getDemande(referenceFinanciere);
                session.setAttribute("maj", maj);
                rd = request.getRequestDispatcher("/updateDemandeFinanciere.jsp");
                rd.forward(request,response);
                
            // Insérer une demande financiere
            }else if (action.equalsIgnoreCase("add")){
                
                //Création d'une nouvelle demande
                DemandeFinanciere financiere = new DemandeFinanciere();
                
                if(request.getParameter("contrat") != null && request.getParameter("depot") != null && request.getParameter("etat") != null && request.getParameter("montant") != null){
                    
                    //Si il y a une requete
                    int contrat = Integer.parseInt(request.getParameter("contrat"));
                    String depot = request.getParameter("depot");
                    String etat = request.getParameter("etat");
                    int montant = Integer.parseInt(request.getParameter("montant"));
                    
                    financiere.insertFinanciere(contrat, depot, etat, montant);
                    rd = request.getRequestDispatcher("/successadd.jsp");
                    rd.forward(request,response);
                }else{ // Si erreur 
                    rd = request.getRequestDispatcher("/error.html");
                    rd.forward(request,response);
                }
                
            // Mettre à jour une demande financiere
            }else if (action.equalsIgnoreCase("update")){
                
                //Création d'une nouvelle demande
                DemandeFinanciere financiere = new DemandeFinanciere();
                
                if(request.getParameter("contrat") != null && request.getParameter("depot") != null && request.getParameter("etat") != null && request.getParameter("montant") != null){                    
                    
                    //Si il y a une requete
                    int referenceFinanciere = (Integer)session.getAttribute("financiere");
                    int contrat = Integer.parseInt(request.getParameter("contrat"));
                    String depot = request.getParameter("depot");
                    String etat = request.getParameter("etat");
                    int montant = Integer.parseInt(request.getParameter("montant"));
                    
                    financiere.updateFinanciere(referenceFinanciere, contrat, depot, etat, montant);
                    rd = request.getRequestDispatcher("/successupdate.jsp");
                    rd.forward(request,response);
                }else{ // Si erreur 
                    rd = request.getRequestDispatcher("/error.html");
                    rd.forward(request,response);
                }
                
            // Supprimer une demande de mobilité
            }else if (action.equalsIgnoreCase("delete")){
                int referenceFinanciere = (Integer)session.getAttribute("financiere");
                DemandeFinanciere.deleteFinanciere(referenceFinanciere);
                rd = request.getRequestDispatcher("/successdelete.jsp");
                rd.forward(request,response); 
                
            }else{
                //Si la session n'existe pas
                rd = request.getRequestDispatcher("/error.html");
                rd.forward(request,response);
            }
        }
    }

    // <editor-fold defaultstate="collapsed" desc="HttpServlet methods. Click on the + sign on the left to edit the code.">
    /**
     * Handles the HTTP <code>GET</code> method.
     *
     * @param request servlet request
     * @param response servlet response
     * @throws ServletException if a servlet-specific error occurs
     * @throws IOException if an I/O error occurs
     */
    @Override
    protected void doGet(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {
        try {
            processRequest(request, response);
        } catch (SQLException ex) {
            Logger.getLogger(DemandesFinancieresController.class.getName()).log(Level.SEVERE, null, ex);
        }
    }

    /**
     * Handles the HTTP <code>POST</code> method.
     *
     * @param request servlet request
     * @param response servlet response
     * @throws ServletException if a servlet-specific error occurs
     * @throws IOException if an I/O error occurs
     */
    @Override
    protected void doPost(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {
        try {
            processRequest(request, response);
        } catch (SQLException ex) {
            Logger.getLogger(DemandesFinancieresController.class.getName()).log(Level.SEVERE, null, ex);
        }
    }

    /**
     * Returns a short description of the servlet.
     *
     * @return a String containing servlet description
     */
    @Override
    public String getServletInfo() {
        return "Short description";
    }// </editor-fold>

}
