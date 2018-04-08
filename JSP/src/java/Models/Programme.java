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


public class Programme {
    
    private String intitule;
    private String description;

    /**
     * @return the intitule
     */
    public String getIntitule() {
        return intitule;
    }

    /**
     * @param intitule the intitule to set
     */
    public void setIntitule(String intitule) {
        this.intitule = intitule;
    }

    /**
     * @return the description
     */
    public String getDescription() {
        return description;
    }

    /**
     * @param description the description to set
     */
    public void setDescription(String description) {
        this.description = description;
    }
    
    
    //Retourne la liste de tous les programmes
    public static Vector<Programme> getProgrammes(){
        
        Vector<Programme> listeProgrammes = new Vector();
        Connection conn = Utils.connect();
        ResultSet rs = null;
        
        try {
            String sql = "SELECT *";
            sql += " FROM programmes";
            rs = Utils.query(conn, sql);
            Programme programme = null;
            while(rs.next()){
                programme = new Programme();
                programme.intitule = rs.getString("INTITULEP");
                programme.description = rs.getString("EXPLICATION");
                listeProgrammes.add(programme);
            }
            //Fermer le resultSet
            rs.close();
        } catch (Exception e) {
            System.out.println(e);
        }
        return listeProgrammes; 
        
    }
    
    
    // Retourne le programme lié à une demande de mobilité
    public static Programme getProgrammeMobilite(int referenceMobilite) {
        
        Programme programme = null;
        Connection conn = Utils.connect();
        ResultSet rs = null;
        
        try {
            String sql = "SELECT programmes.*";
            sql += " FROM programmes, contrats, demandesmobiles";
            sql += " WHERE demandesmobiles.REFDEMMOB = contrats.REFDEMMOB";
            sql += " AND contrats.INTITULEP = programmes.INTITULEP";
            sql += " AND contrats.REFDEMMOB = "+referenceMobilite;
            rs = Utils.query(conn, sql);
            programme = new Programme();
            rs.first();
            programme.intitule = rs.getString("INTITULEP");
            programme.description = rs.getString("EXPLICATION");
            //Fermer le resultSet
            rs.close();
        } catch (Exception e) {
            System.out.println(e);
        }
        return programme; 
        
    }
    
    // Retourne le programme lié à une demande financiere
    public static Programme getProgrammeFinanciere(int idContrat) {
        
        Programme programme = null;
        Connection conn = Utils.connect();
        ResultSet rs = null;
        
        try {
            String sql = "SELECT programmes.*";
            sql += " FROM programmes, contrats, demandesfinancieres";
            sql += " WHERE demandesfinancieres.IDCONTRAT = contrats.IDCONTRAT";
            sql += " AND contrats.INTITULEP = programmes.INTITULEP";
            sql += " AND contrats.IDCONTRAT = "+idContrat;
            rs = Utils.query(conn, sql);
            programme = new Programme();
            rs.first();
            programme.intitule = rs.getString("INTITULEP");
            programme.description = rs.getString("EXPLICATION");
            //Fermer le resultSet
            rs.close();
        } catch (Exception e) {
            System.out.println(e);
        }
        return programme; 
        
    }
    
}
