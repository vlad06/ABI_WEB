<%
//Cette page représente le traitement de l'identification
// elle écrit un message d’erreur si le client n’est pas identifié -->
// définir le pilote ODBC
class.forName("sun.jdbc.odbc.JdbcOdbcDriver");
//définir la connection
java.sql.Connection con;
con=java.sql.DriverManager.getConnection("jdbc:odbc:mfcat","visiteur","visiteur");
//execution d'une requete select
java.sql.PreparedStatement comm=con.prepareStatement("Select prenom from client where email=? and
pssw=?");
//donner des valeurs pour l'exécution de la requete
comm.setString (1,request.getParameter("email"));
comm.setString (2,request.getParameter("pssw"));

java.sql.ResultSet rs=comm.executeQuery();
//balayage du ResultSet
if (rs.next())
 out.print(""); //client existant, pas d'erreur'
else
 out.print("Vous n'êtes pas inscrit !! ");

//fermeture de la commande
comm.close();
//fermer la connection
con.close();%>
