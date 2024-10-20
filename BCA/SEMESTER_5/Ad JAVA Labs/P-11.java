/*Write a RMI program to calculate interest on a particular amount. */

/*InterestCalculator.java:*/

import java.rmi.Remote;
import java.rmi.RemoteException;

public interface InterestCalculator extends Remote 
{
    double calculateSI(double principal, double rate, int time) throws RemoteException;
} 
 

 
/*InterestCalculatorImpl.java: */
 
import java.rmi.RemoteException;
import java.rmi.server.UnicastRemoteObject;

public class InterestCalculatorImpl extends UnicastRemoteObject implements InterestCalculator 
{
    
    public InterestCalculatorImpl() throws RemoteException 
{
        super();
    }

    public double calculateSI(double principal, double rate, int time) throws RemoteException {
        return (principal * rate * time) / 100.0;
    }
}

/*Server.java: */
 
import java.rmi.Naming; 
import java.rmi.registry.LocateRegistry; 
 
public class Server 
{ 
    public static void main(String args[]) 
{         try 
{ 
            InterestCalculatorImpl calculator = new InterestCalculatorImpl(); 
 
            //Create and start the RMI registry on port 1099 
            LocateRegistry.createRegistry(1099); 
 
            //Bind the remote object's stub in the registry 
            Naming.rebind("rmi://localhost/InterestCalculator", calculator); 
            System.out.println("Server started"); 
        } 
catch (Exception e) 
{ 
            System.err.println("Server exception: " + e.toString()); 
            e.printStackTrace(); 
        } 
    } 
} 
 
/*Client.java: */
 
import java.rmi.Naming;

public class Client 
{
    public static void main(String args[]) 
{
        try
 {
            InterestCalculator calculator = (InterestCalculator) Naming.lookup("rmi://localhost/InterestCalculator");
            
            double principal = 1000;
            double rate = 5.0; // rate in percentage
            int time = 2; // time in yr

            double interest = calculator.calculateSI(principal, rate, time);

            System.out.println("Simple Interest: " + interest);
        }
        catch (Exception e) 
{
            System.err.println("Client exception: " + e.toString());
            e.printStackTrace();
        }
    }
}
