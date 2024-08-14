/* 1.Write an applet program in java to draw a face. */

import java.applet.*;
import java.awt.*;
public class Face extends Applet {
  public void paint(Graphics g) {
    setForeground(Color.black);
    g.drawOval(40, 40, 120, 150);
    g.drawOval(57, 75, 30, 20);
    g.drawOval(110, 75, 30, 20);
    g.fillOval(68, 81, 10, 10);
    g.fillOval(121, 81, 10, 10);
    g.drawOval(85, 100, 30, 30);
    g.fillArc(60, 125, 80, 40, 180, 180);
    g.drawOval(25, 92, 15, 30);
    g.drawOval(160, 92, 15, 30);
  }
}
/* <applet code="Face.class" width="300" height="300">
        </applet>
*/
