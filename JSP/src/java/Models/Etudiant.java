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


public class Etudiant {
    
    private int numEtudiant;
    private int codeDip;
    private String nom;
    private String prenom;
    private String mail;
    private String cv;

    /**
     * @return the numEtudiant
     */
    public int getNumEtudiant() {
        return numEtudiant;
    }

    /**
     * @param numEtudiant the numEtudiant to set
     */
    public void setNumEtudiant(int numEtudiant) {
        this.numEtudiant = numEtudiant;
    }

    /**
     * @return the codeDip
     */
    public int getCodeDip() {
        return codeDip;
    }

    /**
     * @param codeDip the codeDip to set
     */
    public void setCodeDip(int codeDip) {
        this.codeDip = codeDip;
    }

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
     * @return the prenom
     */
    public String getPrenom() {
        return prenom;
    }

    /**
     * @param prenom the prenom to set
     */
    public void setPrenom(String prenom) {
        this.prenom = prenom;
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

    /**
     * @return the cv
     */
    public String getCv() {
        return cv;
    }

    /**
     * @param cv the cv to set
     */
    public void setCv(String cv) {
        this.cv = cv;
    }
    
    //Retourne la liste de tous les étudiants
    public static Vector<Etudiant> getEtudiants(){
        
        Vector<Etudiant> listeEtudiants = new Vector();
        Connection conn = Utils.connect();
        ResultSet rs = null;
        
        try {
            String sql = "SELECT *";
            sql += " FROM etudiants";
            rs = Utils.query(conn, sql);
            Etudiant etudiant = null;
            while(rs.next()){
                etudiant = new Etudiant();
                etudiant.numEtudiant = Integer.parseInt(rs.getString("NUMETUDIANT"));
                etudiant.codeDip = Integer.parseInt(rs.getString("CODEDIP"));
                etudiant.nom = rs.getString("NOMET");
                etudiant.prenom = rs.getString("PRENOMET");
                etudiant.mail = rs.getString("EMAIL");
                etudiant.cv = rs.getString("CV");
                listeEtudiants.add(etudiant);
            }
            //Fermer le resultSet
            rs.close();
        } catch (Exception e) {
            System.out.println(e);
        }
        return listeEtudiants;  
    }
    
    //Retourne le nom et prénom de l'étudiant grâce à son numero
    public static String getName(int numero){
        String resultat = "";
        Connection conn = Utils.connect();
        ResultSet rs = null;
        
        try {
            String sql = "SELECT NOMET, PRENOMET";
            sql += " FROM etudiants";
            sql += " WHERE NUMETUDIANT = "+numero;
            rs = Utils.query(conn, sql);
            Etudiant etudiant = null;
            etudiant = new Etudiant();
            rs.first();
            etudiant.nom = rs.getString("NOMET");
            etudiant.prenom = rs.getString("PRENOMET");
            resultat = etudiant.prenom + " " + etudiant.nom;
            //Fermer le resultSet
            rs.close();
        } catch (Exception e) {
            System.out.println(e);
        }
        return resultat; 
    } 
    
}
