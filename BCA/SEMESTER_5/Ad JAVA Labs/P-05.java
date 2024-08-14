/* 5. Write an applet program in Java to accept employee number, name and basic
as parameter. Find the gross and net salary depending on the following
conditions:
    If Basic > 20000, then DA – 50%, HRA – 15%, PF – 12%, PT – 200
    If Basic <= 20000, then DA – 40%, HRA – 10%, PF – 12%, PT – 100
    Gross = Basic + DA + HRA
    Net = Gross – (PT + PF) 
*/

import java.applet.*;
import java.awt.*;
/* <applet 
    code="Employee.class"
    width = 500
    height = 500 >
      <param name="ename" value="Om"></param>
      <param name="ecode" value="1001"></param>
      <param name="basic" value="90000"></param>
  </applet>
*/
public class Employee extends Applet {
  String ename;
  int ecode;
  double basic, net, gross;
  double da, hra, pt, pf;
  public void init() {
    ename = getParameter("ename");
    ecode = Integer.parseInt(getParameter("ecode"));
    basic = Double.parseDouble(getParameter("basic"));
    calculate();
  }
  public void paint(Graphics g) {
    Font font = new Font("Arial", Font.BOLD, 22);
    g.setFont(font);
    g.drawString("Name: " + ename, 20, 40);
    g.drawString("Basic Salary: " + basic, 20, 60);
    g.drawString("DA: " + da, 20, 80);
    g.drawString("HRA: " + hra, 20, 100);
    g.drawString("PF: " + pf, 20, 120);
    g.drawString("PT: " + pt, 20, 140);
    g.drawString("Gross salary: " + gross, 20, 160);
    g.drawString("Net Salary: " + net, 20, 180);
  }
  public void calculate() {
    if (basic <= 20000) {
      da = 0.4 * basic;
      hra = 0.1 * basic;
      gross = basic + da + hra;
      pf = 0.12 * basic;
      pt = 100;
      net = gross - (pf + pt);
    }
    if (basic > 20000) {
      da = 0.5 * basic;
      hra = 0.15 * basic;
      gross = basic + da + hra;
      pf = 0.12 * basic;
      pt = 200;
      net = gross - (pf + pt);
    }
  }
}
