/* 2.Write an applet program in Java to implement a simple calculator. */

import java.applet.*;
import java.awt.*;
import java.awt.event.*;
/* <applet code = "AppletCalc" width = 600 height = 600> </applet>
 */
public class AppletCalc extends Applet implements ActionListener {
  private TextField input1 = new TextField(10);
  private TextField input2 = new TextField(10);
  private Label label1 = new Label("Num 1:");
  private Label label2 = new Label("Num 2:");
  private Label resultLabel = new Label("Result:");
  private Button[] operationButtons = {
      new Button("+"), new Button("-"), new Button("*"), new Button("/")};
  private double result;
  public void init() {
    setLayout(new GridLayout(5, 2)); // grid with 5 rows and 2 columns
    Font largeFont = new Font("Arial&quot", Font.PLAIN, 33);
    Font buttonFont = new Font("Arial", Font.BOLD, 33);
    for (Button button : operationButtons) {
      button.addActionListener(this);
      button.setFont(buttonFont);
    }
    label1.setFont(largeFont);
    label2.setFont(largeFont);
    resultLabel.setFont(largeFont);
    input1.setFont(largeFont);
    input2.setFont(largeFont);
    add(label1); // adding to the grid layout
    add(input1); // this is the order in which controls will be added to the
                 // layout
    add(label2);
    add(input2);
    for (Button button : operationButtons) {
      add(button);
    }
    add(resultLabel);
  }
  public void actionPerformed(ActionEvent e) {
    double num1 = parseInput(input1.getText());
    double num2 = parseInput(input2.getText());
    if (Double.isNaN(num1) || Double.isNaN(num2)) {
      resultLabel.setText("Result: ");
      return;
    }
    if (e.getSource() == operationButtons[0])
      result = num1 + num2;
    else if (e.getSource() == operationButtons[1])
      result = num1 - num2;
    else if (e.getSource() == operationButtons[2])
      result = num1 * num2;
    else if (e.getSource() == operationButtons[3]) {
      if (num2 != 0) {
        result = num1 / num2;
      } else {
        resultLabel.setText("Result: Cantt divide by 0");
        return;
      }
    }
    resultLabel.setText("Result: " + result);
  }
  private double parseInput(String input) {
    try {
      return Double.parseDouble(input);
    } catch (NumberFormatException e) {
      return Double.NaN;
    }
  }
}
