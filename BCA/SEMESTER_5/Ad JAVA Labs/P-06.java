/*6. Write a Java program using swing component. Design a frame to accept a

book id, book code, book name and price. Calculate the discount based on the

following conditions:
Book Code | Discount
A         |  15%
B         |  20%
C         | 25%
Any other is 5%. Calculate the discount and display the bill. */

import java.awt.*;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;
import javax.swing.*;
public class BookStoreGUI extends JFrame implements ActionListener {
  private JLabel labelId, labelCode, labelName, labelPrice, labelDiscount,
      labelTotal;
  private JTextField textFieldId, textFieldCode, textFieldName, textFieldPrice;
  private JButton calculateButton;
  public BookStoreGUI() { // constructor function
    setTitle("Bookstore Billing System");
    setSize(600, 500);
    setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
    setLayout(new GridLayout(6, 2, 10, 10));
    labelId = new JLabel("Enter Book ID:");

    labelCode = new JLabel("Enter Book Code (A, B, C):");

    labelName = new JLabel("Enter Book Name:");
    labelPrice = new JLabel("Enter Book Price:");
    labelDiscount = new JLabel("Discount:");
    labelTotal = new JLabel("Total Bill:");
    textFieldId = new JTextField();
    textFieldCode = new JTextField();
    textFieldName = new JTextField();
    textFieldPrice = new JTextField();
    calculateButton = new JButton("Calculate");
    calculateButton.addActionListener(this);
    add(labelId);
    add(textFieldId);
    add(labelCode);
    add(textFieldCode);
    add(labelName);
    add(textFieldName);
    add(labelPrice);
    add(textFieldPrice);
    add(calculateButton);
    add(labelDiscount);
    add(labelTotal);
    setVisible(true);
  }

  public void actionPerformed(ActionEvent e) {
    if (e.getSource() == calculateButton) {
      double price = Double.parseDouble(textFieldPrice.getText());
      double discount = 0.0;
      String bookCode = textFieldCode.getText().toUpperCase();
      switch (bookCode) {
        case "A":
          discount = 0.15;
          break;
        case "B":
          discount = 0.20;
          break;
        case "C":
          discount = 0.25;
          break;
        default:
          discount = 0.05;
      }
      double calculatedDiscount = price * discount;
      double totalBill = price - calculatedDiscount;
      labelDiscount.setText("Discount: " + (discount * 100) + "%");

      labelTotal.setText("Total Bill: $" + totalBill);
    }
  }
  public static void main(String args[]) {
    SwingUtilities.invokeLater(() -> new BookStoreGUI());
  }
}