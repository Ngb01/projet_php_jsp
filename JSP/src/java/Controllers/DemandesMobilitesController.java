package Controllers;

import Models.Contrat;
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


public class DemandesMobilitesController extends HttpServlet {
    
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
            
            // Consulter les des demandes de mobilités pour un étudiant
            if(action.equalsIgnoreCase("paretudiant")){
                int etudiant = Integer.parseInt(request.getParameter("etudiant"));
                //Affichage la liste des demandes de mobilites pour l'étudiant donné
                Vector<DemandeMobilite> listeMobilite = DemandeMobilite.getMobiliteEtudiant(etudiant);
                session.setAttribute("listeMobilites", listeMobilite);
                rd = request.getRequestDispatcher("/listeMobilites.jsp");
                rd.forward(request,response);
            
            // Consulter les des demandes de mobilités pour une université   
            }else if(action.equalsIgnoreCase("paruniversite")){
                String universite = request.getParameter("universite");
                //Affichage la liste des demandes de mobilites pour l'universite donnée
                Vector<DemandeMobilite> listeMobilite = DemandeMobilite.getMobiliteUniversite(universite);
                session.setAttribute("listeMobilites", listeMobilite);
                rd = request.getRequestDispatcher("/listeMobilites.jsp");
                rd.forward(request,response);
            
            // Consulter les des demandes de mobilités pour un diplome
            }else if(action.equalsIgnoreCase("pardiplome")){
                int diplome = Integer.parseInt(request.getParameter("diplome"));
                //Affichage la liste des demandes de mobilites pour le diplome donné
                Vector<DemandeMobilite> listeMobilite = DemandeMobilite.getMobiliteDiplome(diplome);
                session.setAttribute("listeMobilites", listeMobilite);
                rd = request.getRequestDispatcher("/listeMobilites.jsp");
                rd.forward(request,response);
                
            // Accéder au programme lié à une demande de mobilité
            }else if(action.equalsIgnoreCase("programme")){
                int referenceMobilite = (Integer)session.getAttribute("mobilite");
                //Afficher le programme lié à la demande de mobilité
                Programme programme = Programme.getProgrammeMobilite(referenceMobilite);
                session.setAttribute("programme", programme);
                rd = request.getRequestDispatcher("/programme.jsp");
                rd.forward(request,response);
                
            // Accéder aux contrats liés à une demande de mobilité
            }else if(action.equalsIgnoreCase("contrat")){
                int referenceMobilite = (Integer)session.getAttribute("mobilite");
                //Affichage la liste des demandes de mobilites pour le diplome donné
                Vector<Contrat> listeContrat = Contrat.getContratsMobilite(referenceMobilite);
                session.setAttribute("listeContrats", listeContrat);
                rd = request.getRequestDispatcher("/contrat.jsp");
                rd.forward(request,response);
                
            // Renvoi sur le formulaire d'ajout d'une demande de mobilité
            }else if(action.equalsIgnoreCase("addform")){
                rd = request.getRequestDispatcher("/addDemandeMobilite.jsp");
                rd.forward(request,response);
                
            // Renvoi sur le formulaire de modification d'une demande de mobilité
            }else if(action.equalsIgnoreCase("updateform")){
                int referenceMobilite = (Integer)session.getAttribute("mobilite");
                //Récupération des données de la demande qui va être mise à jour
                DemandeMobilite maj = DemandeMobilite.getDemande(referenceMobilite);
                session.setAttribute("maj", maj);
                rd = request.getRequestDispatcher("/updateDemandeMobilite.jsp");
                rd.forward(request,response);
                
            // Insérer une demande de mobilité
            }else if (action.equalsIgnoreCase("add")){
                
                //Création d'une nouvelle demande
                DemandeMobilite mobilite = new DemandeMobilite();
                
                if(request.getParameter("etudiant") != null && request.getParameter("diplome") != null && request.getParameter("depot") != null && request.getParameter("etat") != null){
                    
                    //Si il y a une requete
                    int etudiant = Integer.parseInt(request.getParameter("etudiant"));
                    int diplome = Integer.parseInt(request.getParameter("diplome"));
                    String depot = request.getParameter("depot");
                    String etat = request.getParameter("etat");
                    
                    mobilite.insertMobilite(etudiant, diplome, depot, etat);
                    rd = request.getRequestDispatcher("/successadd.jsp");
                    rd.forward(request,response);
                }else{ // Si erreur 
                    rd = request.getRequestDispatcher("/error.html");
                    rd.forward(request,response);
                }
                
            // Mettre à jour une demande de mobilité
            }else if (action.equalsIgnoreCase("update")){
                
                //Création d'une nouvelle demande
                DemandeMobilite mobilite = new DemandeMobilite();
                
                if(request.getParameter("etudiant") != null && request.getParameter("diplome") != null && request.getParameter("depot") != null && request.getParameter("etat") != null){
                    
                    //Si il y a une requete
                    int referenceMobilite = (Integer)session.getAttribute("mobilite");
                    int etudiant = Integer.parseInt(request.getParameter("etudiant"));
                    int diplome = Integer.parseInt(request.getParameter("diplome"));
                    String depot = request.getParameter("depot");
                    String etat = request.getParameter("etat");
                    
                    mobilite.updateMobilite(referenceMobilite, etudiant, diplome, depot, etat);
                    rd = request.getRequestDispatcher("/successupdate.jsp");
                    rd.forward(request,response);
                }else{ // Si erreur 
                    rd = request.getRequestDispatcher("/error.html");
                    rd.forward(request,response);
                }
                
            // Supprimer une demande de mobilité
            }else if (action.equalsIgnoreCase("delete")){
                int referenceMobilite = (Integer)session.getAttribute("mobilite");
                DemandeMobilite.deleteMobilite(referenceMobilite);
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
            Logger.getLogger(DemandesMobilitesController.class.getName()).log(Level.SEVERE, null, ex);
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
            Logger.getLogger(DemandesMobilitesController.class.getName()).log(Level.SEVERE, null, ex);
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
