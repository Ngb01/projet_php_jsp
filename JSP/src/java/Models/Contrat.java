/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package Models;

import Utils.Utils;
import java.sql.Connection;
import java.sql.ResultSet;
import java.util.Vector;


public class Contrat {
    
    private int idcontrat;
    private int diplome;
    private int mobilite;
    private String programme;
    private int duree;
    private String etat;
    

    /**
     * @return the idcontrat
     */
    public int getIdcontrat() {
        return idcontrat;
    }

    /**
     * @param idcontrat the idcontrat to set
     */
    public void setIdcontrat(int idcontrat) {
        this.idcontrat = idcontrat;
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
     * @return the mobilite
     */
    public int getMobilite() {
        return mobilite;
    }

    /**
     * @param mobilite the mobilite to set
     */
    public void setMobilite(int mobilite) {
        this.mobilite = mobilite;
    }

    /**
     * @return the programme
     */
    public String getProgramme() {
        return programme;
    }

    /**
     * @param programme the programme to set
     */
    public void setProgramme(String programme) {
        this.programme = programme;
    }

    /**
     * @return the duree
     */
    public int getDuree() {
        return duree;
    }

    /**
     * @param duree the duree to set
     */
    public void setDuree(int duree) {
        this.duree = duree;
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
    
    
    //Retourne la liste de tous les contrats
    public static Vector<Contrat> getContrats(){
        
        Vector<Contrat> listeContrats = new Vector();
        Connection conn = Utils.connect();
        ResultSet rs = null;
        
        try {
            String sql = "SELECT *";
            sql += " FROM contrats";
            rs = Utils.query(conn, sql);
            Contrat contrat = null;
            while(rs.next()){
                contrat = new Contrat();
                contrat.idcontrat = Integer.parseInt(rs.getString("IDCONTRAT"));
                contrat.diplome = Integer.parseInt(rs.getString("CODEDIP"));
                contrat.mobilite = Integer.parseInt(rs.getString("REFDEMMOB"));
                contrat.programme = rs.getString("INTITULEP");
                contrat.duree = Integer.parseInt(rs.getString("DUREE"));
                contrat.etat = rs.getString("ETATCONTRAT");
                listeContrats.add(contrat);
            }
            //Fermer le resultSet
            rs.close();
        } catch (Exception e) {
            System.out.println(e);
        }
        return listeContrats;  
    }
    
    
    // Retourne les contrats liés à une demande de mobilité
    public static Vector<Contrat> getContratsMobilite(int referenceMobilite) {
        
        Vector<Contrat> listeContrats = new Vector();
        Connection conn = Utils.connect();
        ResultSet rs = null;
        
        try {
            String sql = "SELECT *";
            sql += " FROM contrats";
            sql += " WHERE REFDEMMOB = "+referenceMobilite;
            rs = Utils.query(conn, sql);
            Contrat contrat = null;
            while(rs.next()){
                contrat = new Contrat();
                contrat.idcontrat = Integer.parseInt(rs.getString("IDCONTRAT"));
                contrat.diplome = Integer.parseInt(rs.getString("CODEDIP"));
                contrat.mobilite = Integer.parseInt(rs.getString("REFDEMMOB"));
                contrat.programme = rs.getString("INTITULEP");
                contrat.duree = Integer.parseInt(rs.getString("DUREE"));
                contrat.etat = rs.getString("ETATCONTRAT");
                listeContrats.add(contrat);
            }
            //Fermer le resultSet
            rs.close();
        } catch (Exception e) {
            System.out.println(e);
        }
        return listeContrats;  
    }
    
   
    // Retourne les contrats liés à une demande financiere
    public static Vector<Contrat> getContratsFinanciere(int idContrat) {
        
        Vector<Contrat> listeContrats = new Vector();
        Connection conn = Utils.connect();
        ResultSet rs = null;
        
        try {
            String sql = "SELECT *";
            sql += " FROM contrats";
            sql += " WHERE IDCONTRAT = "+idContrat;
            rs = Utils.query(conn, sql);
            Contrat contrat = null;
            while(rs.next()){
                contrat = new Contrat();
                contrat.idcontrat = Integer.parseInt(rs.getString("IDCONTRAT"));
                contrat.diplome = Integer.parseInt(rs.getString("CODEDIP"));
                contrat.mobilite = Integer.parseInt(rs.getString("REFDEMMOB"));
                contrat.programme = rs.getString("INTITULEP");
                contrat.duree = Integer.parseInt(rs.getString("DUREE"));
                contrat.etat = rs.getString("ETATCONTRAT");
                listeContrats.add(contrat);
            }
            //Fermer le resultSet
            rs.close();
        } catch (Exception e) {
            System.out.println(e);
        }
        return listeContrats;  
    }
    
    
    //Retourne le programme associé à un contrat grâce à son ID
    public static String getProgramme(int id){
        
        String resultat = "";
        Connection conn = Utils.connect();
        ResultSet rs = null;
        
        try {
            String sql = "SELECT INTITULEP";
            sql += " FROM contrats";
            sql += " WHERE IDCONTRAT = "+id;
            rs = Utils.query(conn, sql);
            Contrat contrat = null;
            rs.first();
            contrat = new Contrat();
            resultat = rs.getString("INTITULEP");
            //Fermer le resultSet
            rs.close();
        } catch (Exception e) {
            System.out.println(e);
        }
        return resultat;  
    }
    
    //Retourne la référence de la demande de mobilité associé à un contrat grâce à son ID
    public static int getMobilite(int id){
        
        int resultat = 0;
        Connection conn = Utils.connect();
        ResultSet rs = null;
        
        try {
            String sql = "SELECT REFDEMMOB";
            sql += " FROM contrats";
            sql += " WHERE IDCONTRAT = "+id;
            rs = Utils.query(conn, sql);
            Contrat contrat = null;
            rs.first();
            contrat = new Contrat();
            resultat = Integer.parseInt(rs.getString("REFDEMMOB"));
            //Fermer le resultSet
            rs.close();
        } catch (Exception e) {
            System.out.println(e);
        }
        return resultat;  
    }
    
}
