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


public class Diplome {
    
    private int code;
    private String universite;
    private String intitule;
    private String site;
    private String niveau;

    
    /**
     * @return the code
     */
    public int getCode() {
        return code;
    }

    /**
     * @param code the code to set
     */
    public void setCode(int code) {
        this.code = code;
    }

    /**
     * @return the universite
     */
    public String getUniversite() {
        return universite;
    }

    /**
     * @param universite the universite to set
     */
    public void setUniversite(String universite) {
        this.universite = universite;
    }

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
     * @return the site
     */
    public String getSite() {
        return site;
    }

    /**
     * @param site the site to set
     */
    public void setSite(String site) {
        this.site = site;
    }

    /**
     * @return the niveau
     */
    public String getNiveau() {
        return niveau;
    }

    /**
     * @param niveau the niveau to set
     */
    public void setNiveau(String niveau) {
        this.niveau = niveau;
    }
    
    
    //Retourne la liste de tous les étudiants
    public static Vector<Diplome> getDiplomes(){
        
        Vector<Diplome> listeDiplomes = new Vector();
        Connection conn = Utils.connect();
        ResultSet rs = null;
        
        try {
            String sql = "SELECT *";
            sql += " FROM diplomes";
            rs = Utils.query(conn, sql);
            Diplome diplome = null;
            while(rs.next()){
                diplome = new Diplome();
                diplome.code = Integer.parseInt(rs.getString("CODEDIP"));
                diplome.universite = rs.getString("NOMU");
                diplome.intitule = rs.getString("INTITULEDIP");
                diplome.site = rs.getString("ADRESSEWEBD");
                diplome.niveau = rs.getString("NIVEAU");
                listeDiplomes.add(diplome);
            }
            //Fermer le resultSet
            rs.close();
        } catch (Exception e) {
            System.out.println(e);
        }
        return listeDiplomes;  
    }
    
    //Retourne l'intitule du diplome grâce à son ID
    public static String getIntitule(int code){
        String resultat = "";
        Connection conn = Utils.connect();
        ResultSet rs = null;
        
        try {
            String sql = "SELECT INTITULEDIP";
            sql += " FROM diplomes";
            sql += " WHERE CODEDIP = "+code;
            rs = Utils.query(conn, sql);
            rs.first();
            Diplome diplome = null;
            diplome = new Diplome();
            diplome.intitule = rs.getString("INTITULEDIP");
            resultat = diplome.intitule;
            //Fermer le resultSet
            rs.close();
        } catch (Exception e) {
            System.out.println(e);
        }
        return resultat;  
    } 

    
}
