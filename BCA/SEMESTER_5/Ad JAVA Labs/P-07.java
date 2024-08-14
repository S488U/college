/*7. Write a Java program using swing component. Design a frame to generate

electricity bill. Accept the meter number, customer name, previous reading,

current reading. Use data validation to check whether the current meter
reading is greater than the previous meter reading. Produce a bill in neat
format. Calculate the bill based on consumption as follows:
Modules < 150 - Rs. 200
For next 50 Modules Rs. 1.50/Module, for
next 100 Modules Rs. 2.00/Module
For next additional Modules Rs. 3.00/Module or Rs. 500 whichever is
maximum. */

import java.awt.*;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;
import javax.swing.*;
public class ElectricityBillGenerator extends JFrame implements ActionListener {
   private JLabel meterLabel, nameLabel, prevReadingLabel, currReadingLabel,
       billLabel;
   private JTextField meterField, nameField, prevReadingField, currReadingField,
       billField;
   private JButton calcButton;
   public ElectricityBillGenerator() { // constructor function
      setTitle("Electricity Bill Generator");
      setSize(400, 300);
      setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
      setLayout(new GridLayout(6, 2, 10, 10));
      meterLabel = new JLabel("Meter Number:");
      nameLabel = new JLabel("Customer Name:");
      prevReadingLabel = new JLabel("Previous Reading:");
      currReadingLabel = new JLabel("Current Reading:");
      billLabel = new JLabel("Bill Amount:");
      meterField = new JTextField();
      nameField = new JTextField();
      prevReadingField = new JTextField();
      currReadingField = new JTextField();
      billField = new JTextField();
      calcButton = new JButton("Calculate Bill");
      calcButton.addActionListener(this);
      add(meterLabel);
      add(meterField);
      add(nameLabel);
      add(nameField);
      add(prevReadingLabel);
      add(prevReadingField);
      add(currReadingLabel);
      add(currReadingField);
      add(billLabel);
      add(billField);
      add(calcButton);

      setVisible(true);
   }
   public void actionPerformed(ActionEvent e) {
      if (e.getSource() == calcButton) {
         int prevReading = Integer.parseInt(prevReadingField.getText());
         int currReading = Integer.parseInt(currReadingField.getText());
         if (currReading < prevReading) {
 JOptionPane.showMessageDialog(this, "Current reading cannot be less than previous
reading.");
 return;
         }
         int unitsConsumed = currReading - prevReading;
         double billAmount = calculateBill(unitsConsumed);
         billField.setText(String.format("Rs. %.2f", billAmount));
      }
   }
   private double calculateBill(int unitsConsumed) {
      double bill = 0;
      if (unitsConsumed <= 150) {
         bill = 200;
      } else if (unitsConsumed <= 200) {
         bill = 200 + (unitsConsumed - 150) * 1.5;
      } else if (unitsConsumed <= 300) {
         bill = 200 + 50 * 1.5 + (unitsConsumed - 200) * 2;
      } else {
         double excessUnits = unitsConsumed - 300;
         bill = 200 + 50 * 1.5 + 100 * 2 + Math.max(excessUnits * 3, 500);
      }
      return bill;
   }
   public static void main(String args[]) {
      SwingUtilities.invokeLater(() -> new ElectricityBillGenerator());
   }
}