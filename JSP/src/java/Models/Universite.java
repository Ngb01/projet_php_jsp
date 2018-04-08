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


public class Universite {
    
    private String nom;
    private String adresse;
    private String site;
    private String mail;

    /**
     * @return the nom
     */
    public String getNom() {
        return nom;
    }

    /**
     * @param nom the nom to set
     */
    public void setNom(String nom) {
        this.nom = nom;
    }

    /**
     * @return the adresse
     */
    public String getAdresse() {
        return adresse;
    }

    /**
     * @param adresse the adresse to set
     */
    public void setAdresse(String adresse) {
        this.adresse = adresse;
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
     * @return the mail
     */
    public String getMail() {
        return mail;
    }

    /**
     * @param mail the mail to set
     */
    public void setMail(String mail) {
        this.mail = mail;
    }
    
    //Retourne la liste de toutes les universités
    public static Vector<Universite> getUniversites(){
        
        Vector<Universite> listeUniversites = new Vector();
        Connection conn = Utils.connect();
        ResultSet rs = null;
        
        try {
            String sql = "SELECT *";
            sql += " FROM universites";
            rs = Utils.query(conn, sql);
            Universite universite = null;
            while(rs.next()){
                universite = new Universite();
                universite.nom = rs.getString("NOMU");
                universite.adresse = rs.getString("ADRESSEPOSTU");
                universite.site = rs.getString("ADRESSEWEBU");
                universite.mail = rs.getString("ADRESSEELECTU");
                listeUniversites.add(universite);
            }
            //Fermer le resultSet
            rs.close();
        } catch (Exception e) {
            System.out.println(e);
        }
        return listeUniversites;
        
    }
    
}
