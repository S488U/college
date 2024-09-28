/*Write a JDBC program to retrieve the details from telephone directory*/

import java.sql.*;
import java.io.*;

public class TeleDirBook {
    public static void main(String args[]) {
        String connectionUrl = "jdbc:mysql://localhost:3307/tele_db";
        String dbuser = "root";
        String dbpswd = "";
        DataInputStream in = new DataInputStream(System.in);
        String ch;
        int flag = 0;

        try {
            Class.forName("com.mysql.cj.jdbc.Driver");
            Connection con = DriverManager.getConnection(connectionUrl, dbuser, dbpswd);
            Statement st = con.createStatement();
            System.out.println("Enter a few characters of user name:");
            ch = in.readLine();
            ResultSet rec = st.executeQuery("select * from tele where name LIKE '%" + ch + "%'");

            while (rec.next()) {
                System.out.print(rec.getString("name"));
                System.out.println("\t" + rec.getString("phoneno"));
                flag = 1;
            }

            if (flag == 0) {
                System.out.println("No Record Found");
            }
        } catch (Exception e) {
            e.printStackTrace();
        }
    }
}
