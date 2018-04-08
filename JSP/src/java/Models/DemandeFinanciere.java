/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package Models;

import Utils.Utils;
import java.sql.Connection;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.util.Vector;


public class DemandeFinanciere {
    
    private int reference;
    private int contrat;
    private String depot;
    private String etat;
    private int montant;

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
     * @return the contrat
     */
    public int getContrat() {
        return contrat;
    }

    /**
     * @param contrat the contrat to set
     */
    public void setContrat(int contrat) {
        this.contrat = contrat;
    }

    /**
     * @return the depot
     */
    public String getDepot() {
        return depot;
    }

    /**
     * @param depot the depot to set
     */
    public void setDepot(String depot) {
        this.depot = depot;
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

    /**
     * @return the montant
     */
    public int getMontant() {
        return montant;
    }

    /**
     * @param montant the montant to set
     */
    public void setMontant(int montant) {
        this.montant = montant;
    }
    
    
    //Retourne les informations d'une demande de mobilité grâce à son ID
    public static DemandeFinanciere getDemande(int reference){
        
        DemandeFinanciere financiere = null;
        Connection conn = Utils.connect();
        ResultSet rs = null;
        
        try {
            String sql = "SELECT *";
            sql += " FROM demandesfinancieres";
            sql += " WHERE REFDEMFIN = "+reference;
            rs = Utils.query(conn, sql);
            rs.first();
            financiere = new DemandeFinanciere();
            financiere.reference = Integer.parseInt(rs.getString("REFDEMFIN"));
            financiere.contrat = Integer.parseInt(rs.getString("IDCONTRAT"));
            financiere.depot = rs.getString("DATEDEPOTDEMFIN");
            financiere.etat = rs.getString("ETATDEMFIN");
            financiere.montant = Integer.parseInt(rs.getString("MONTANTACCORDE"));
            //Fermer le resultSet
            rs.close();
        } catch (Exception e) {
            System.out.println(e);
        }
        return financiere;  
    }
    
    
    // Retourne toutes les demandes finanières pour un contrat donné
    public static Vector<DemandeFinanciere> getFinanciereContrat(int contrat){
        
        Vector<DemandeFinanciere> listeFinanciere = new Vector();
        Connection conn = Utils.connect();
        ResultSet rs = null;
        
        try {
            String sql = "SELECT *";
            sql += " FROM demandesfinancieres";
            sql += " WHERE IDCONTRAT = '"+contrat+"'";
            rs = Utils.query(conn, sql);
            DemandeFinanciere financiere = null;
            while(rs.next()){
                financiere = new DemandeFinanciere();
                financiere.reference = Integer.parseInt(rs.getString("REFDEMFIN"));
                financiere.contrat = Integer.parseInt(rs.getString("IDCONTRAT"));
                financiere.depot = rs.getString("DATEDEPOTDEMFIN");
                financiere.etat = rs.getString("ETATDEMFIN");
                financiere.montant = Integer.parseInt(rs.getString("MONTANTACCORDE"));
                listeFinanciere.add(financiere);
            }
            //Fermer le resultSet
            rs.close();
        } catch (Exception e) {
            System.out.println(e);
        }
        return listeFinanciere;
        
    }
    
    
    // Retourne toutes les demandes financières pour un programme donné
    public static Vector<DemandeFinanciere> getFinanciereProgramme(String programme){
        
        Vector<DemandeFinanciere> listeFinanciere = new Vector();
        Connection conn = Utils.connect();
        ResultSet rs = null;
        
        try {
            String sql = "SELECT demandesfinancieres.*";
            sql += " FROM demandesfinancieres, contrats";
            sql += " WHERE demandesfinancieres.IDCONTRAT = contrats.IDCONTRAT";
            sql += " AND contrats.INTITULEP = '"+programme+"'";
            rs = Utils.query(conn, sql);
            DemandeFinanciere financiere = null;
            while(rs.next()){
                financiere = new DemandeFinanciere();
                financiere.reference = Integer.parseInt(rs.getString("REFDEMFIN"));
                financiere.contrat = Integer.parseInt(rs.getString("IDCONTRAT"));
                financiere.depot = rs.getString("DATEDEPOTDEMFIN");
                financiere.etat = rs.getString("ETATDEMFIN");
                financiere.montant = Integer.parseInt(rs.getString("MONTANTACCORDE"));
                listeFinanciere.add(financiere);
            }
            //Fermer le resultSet
            rs.close();
        } catch (Exception e) {
            System.out.println(e);
        }
        return listeFinanciere;
        
    }
    
    
    //Pour insérer une demande financiere dans la base
    public void insertFinanciere(int contrat, String depot, String etat, int montant) throws SQLException{
        Connection conn = Utils.connect();
        
        String sql = "INSERT INTO demandesfinancieres";
        sql += " VALUES (null, '"+ contrat + "' ,'" + depot + "', '"+ etat +"', '"+ montant +"')";
        Utils.update(conn, sql);
    }
    
    //Pour mettre à jour une demande financiere dans la base
    public void updateFinanciere(int id, int contrat, String depot, String etat, int montant) throws SQLException{
        Connection conn = Utils.connect();
        
        String sql = "UPDATE demandesfinancieres";
        sql += " SET IDCONTRAT = " + contrat + ", DATEDEPOTDEMFIN = " + depot + ", ETATDEMFIN = '" + etat + "', MONTANTACCORDE = '"+ montant +"'";
        sql += " WHERE REFDEMFIN = "+id;
        Utils.update(conn, sql);
    }
    
    
    //Pour supprimer une demande financiere dans la base grâce à son id
    public static void deleteFinanciere(int id) throws SQLException{
        Connection conn = Utils.connect();
        
        String sql = "DELETE FROM demandesfinancieres";
        sql += " WHERE REFDEMFIN = "+id;
        Utils.update(conn, sql);
    }
    
}
