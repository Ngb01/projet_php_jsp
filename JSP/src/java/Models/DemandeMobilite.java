/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package Models;

import Utils.Utils;
import static java.lang.System.out;
import java.sql.Connection;
import java.sql.ResultSet;
import java.sql.Date;
import java.sql.SQLException;
import java.util.Vector;

public class DemandeMobilite {
   
    private int reference;
    private int etudiant;
    private int diplome;
    private String depot;
    private String etat;

    /**
     * @return the reference
     */
    public int getReference() {
        return reference;
    }

    /**
     * @param reference the reference to set
     */
    public void setReference(int reference) {
        this.reference = reference;
    }

    /**
     * @return the etudiant
     */
    public int getEtudiant() {
        return etudiant;
    }

    /**
     * @param etudiant the etudiant to set
     */
    public void setEtudiant(int etudiant) {
        this.etudiant = etudiant;
    }

    /**
     * @return the diplome
     */
    public int getDiplome() {
        return diplome;
    }

    /**
     * @param diplome the diplome to set
     */
    public void setDiplome(int diplome) {
        this.diplome = diplome;
    }

    /**
     * @return the date
     */
    public String getDepot() {
        return depot;
    }

    /**
     * @param date the date to set
     */
    public void setDepot(String date) {
        this.depot = date;
    }

    /**
     * @return the etat
     */
    public String getEtat() {
        return etat;
    }

    /**
     * @param etat the etat to set
     */
    public void setEtat(String etat) {
        this.etat = etat;
    }
    
    
    //Retourne les informations d'une demande de mobilité grâce à son ID
    public static DemandeMobilite getDemande(int reference){
        
        DemandeMobilite mobilite = null;
        Connection conn = Utils.connect();
        ResultSet rs = null;
        
        try {
            String sql = "SELECT *";
            sql += " FROM demandesmobiles";
            sql += " WHERE REFDEMMOB = "+reference;
            rs = Utils.query(conn, sql);
            rs.first();
            mobilite = new DemandeMobilite();
            mobilite.reference = Integer.parseInt(rs.getString("REFDEMMOB"));
            mobilite.etudiant = Integer.parseInt(rs.getString("NUMETUDIANT"));
            mobilite.diplome = Integer.parseInt(rs.getString("CODEDIP"));
            mobilite.depot = rs.getString("DATEDEPOTDEMMOB");
            mobilite.etat = rs.getString("ETATDEMMOB");
            //Fermer le resultSet
            rs.close();
        } catch (Exception e) {
            System.out.println(e);
        }
        return mobilite;  
    }
    
    
    //Retourne la liste des demandes de mobilités pour un étudiant
    public static Vector<DemandeMobilite> getMobiliteEtudiant(int etudiant){
        
        Vector<DemandeMobilite> listeMobilite = new Vector();
        Connection conn = Utils.connect();
        ResultSet rs = null;
        
        try {
            String sql = "SELECT *";
            sql += " FROM demandesmobiles";
            sql += " WHERE NUMETUDIANT = '"+etudiant+"'";
            rs = Utils.query(conn, sql);
            DemandeMobilite mobilite = null;
            while(rs.next()){
                mobilite = new DemandeMobilite();
                mobilite.reference = Integer.parseInt(rs.getString("REFDEMMOB"));
                mobilite.etudiant = Integer.parseInt(rs.getString("NUMETUDIANT"));
                mobilite.diplome = Integer.parseInt(rs.getString("CODEDIP"));
                mobilite.depot = rs.getString("DATEDEPOTDEMMOB");
                mobilite.etat = rs.getString("ETATDEMMOB");
                listeMobilite.add(mobilite);
            }
            //Fermer le resultSet
            rs.close();
        } catch (Exception e) {
            System.out.println(e);
        }
        return listeMobilite;
        
    }
    
    //Retourne la liste des demandes de mobilités par universite
    public static Vector<DemandeMobilite> getMobiliteUniversite(String universite){
        
        Vector<DemandeMobilite> listeMobilite = new Vector();
        Connection conn = Utils.connect();
        ResultSet rs = null;
        
        try {
            String sql = "SELECT dm.*";
            sql += " FROM demandesmobiles dm, diplomes d";
            sql += " WHERE d.CODEDIP = dm.CODEDIP";
            sql += " AND d.NOMU = '"+universite+"'";
            rs = Utils.query(conn, sql);
            DemandeMobilite mobilite = null;
            while(rs.next()){
                mobilite = new DemandeMobilite();
                mobilite.reference = Integer.parseInt(rs.getString("REFDEMMOB"));
                mobilite.etudiant = Integer.parseInt(rs.getString("NUMETUDIANT"));
                mobilite.diplome = Integer.parseInt(rs.getString("CODEDIP"));
                mobilite.depot = rs.getString("DATEDEPOTDEMMOB");
                mobilite.etat = rs.getString("ETATDEMMOB");
                listeMobilite.add(mobilite);
            }
            //Fermer le resultSet
            rs.close();
        } catch (Exception e) {
            System.out.println(e);
        }
        return listeMobilite;
        
    }
    
    //Retourne la liste des demandes de mobilités par diplome
    public static Vector<DemandeMobilite> getMobiliteDiplome(int diplome){
        
        Vector<DemandeMobilite> listeMobilite = new Vector();
        Connection conn = Utils.connect();
        ResultSet rs = null;
        
        try {
            String sql = "SELECT dm.*";
            sql += " FROM demandesmobiles dm, diplomes d";
            sql += " WHERE d.CODEDIP = dm.CODEDIP";
            sql += " AND dm.CODEDIP = '"+diplome+"'";
            rs = Utils.query(conn, sql);
            DemandeMobilite mobilite = null;
            while(rs.next()){
                mobilite = new DemandeMobilite();
                mobilite.reference = Integer.parseInt(rs.getString("REFDEMMOB"));
                mobilite.etudiant = Integer.parseInt(rs.getString("NUMETUDIANT"));
                mobilite.diplome = Integer.parseInt(rs.getString("CODEDIP"));
                mobilite.depot = rs.getString("DATEDEPOTDEMMOB");
                mobilite.etat = rs.getString("ETATDEMMOB");
                listeMobilite.add(mobilite);
            }
            //Fermer le resultSet
            rs.close();
        } catch (Exception e) {
            System.out.println(e);
        }
        return listeMobilite;
        
    }
    
    //Retourne la date de dépôt de la demande de mobilité grâce à son ID
    public static String getDepot(int reference){
        String resultat = "";
        Connection conn = Utils.connect();
        ResultSet rs = null;
        
        try {
            String sql = "SELECT DATEDEPOTDEMMOB";
            sql += " FROM demandesmobiles";
            sql += " WHERE REFDEMMOB = "+reference;
            rs = Utils.query(conn, sql);
            rs.first();
            DemandeMobilite mobilite = null;
            mobilite = new DemandeMobilite();
            mobilite.depot = rs.getString("DATEDEPOTDEMMOB");
            resultat = mobilite.depot;
            //Fermer le resultSet
            rs.close();
        } catch (Exception e) {
            System.out.println(e);
        }
        return resultat;  
    }
    
    
    //Pour insérer une demande de mobilité dans la base
    public void insertMobilite(int etudiant, int diplome, String depot, String etat) throws SQLException{
        Connection conn = Utils.connect();
        
        String sql = "INSERT INTO demandesmobiles";
        sql += " VALUES (null,'" + etudiant + "' ,'"+ diplome + "' ,'" + depot + "', '"+ etat +"')";
        Utils.update(conn, sql);
    }
    
    //Pour mettre à jour une demande de mobilité dans la base
    public void updateMobilite(int id, int etudiant, int diplome, String depot, String etat) throws SQLException{
        Connection conn = Utils.connect();
        
        String sql = "UPDATE demandesmobiles";
        sql += " SET NUMETUDIANT = "+ etudiant + ", CODEDIP = " + diplome + ", DATEDEPOTDEMMOB = '" + depot + "', ETATDEMMOB = '"+ etat +"'";
        sql += " WHERE REFDEMMOB = "+id;
        Utils.update(conn, sql);
    }
    
    
    //Pour supprimer une demande de mobilité dans la base grâce à son id
    public static void deleteMobilite(int id) throws SQLException{
        Connection conn = Utils.connect();
        
        String sql = "DELETE FROM demandesmobiles";
        sql += " WHERE REFDEMMOB = "+id;
        Utils.update(conn, sql);
    }

    
}
