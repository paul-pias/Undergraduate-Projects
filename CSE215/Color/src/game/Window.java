package game;

import java.awt.*;
import java.awt.event.KeyEvent;
import java.awt.event.KeyListener;

import javax.swing.*;

public class Window extends JPanel implements KeyListener {
	
	Circle[] circles = new Circle[5] ;
	int circlecount=1;
	
	Dot [] dots = new Dot[5];
	int dotcount=1; 
	
	CC [] doublec = new CC[5];
	int cccount=1;
	
	ColorChanger cc;
	ColorChanger cc1;
	ColorChanger cc2;
	
	
	ColorPic cp;

     Ball ball = new Ball(420,650,true,"images//ball//pink.png");
	
	boolean upKeyPressed = false;
	
	static int score = 0;
	
	public Window(){
		super();
		
		
		
		super.addKeyListener(this);
		super.setFocusable(true);
	
		int x=370,y=100;
		for(int i = 0; i < circles.length; i++){
			circles[i] = new Circle(x,y+400,false,"images//circle//"+(i+1)+".png");
			
		}
		
		for(int i = 0; i < dots.length; i++){
			dots[i] = new Dot(x,y+175,false,"images//rectangle//"+(i+1)+".png");
			
		}
		
		for(int i = 0; i < doublec.length; i++){
			doublec[i] = new CC(x-25,y-90,false,"images//cc//"+(i+1)+".png");
			
		}
		
		
			cc1 = new ColorChanger(x+30,y+100,false,"images//color.png");
			cc = new ColorChanger(x+30,y+320,false,"images//color.png");
			cc2 = new ColorChanger(x+30,y-170,false,"images//color.png");
		
			cp = new ColorPic(x-40,y+630,true,"images//c.png");
		}
		
		

		
	
	
	
	public void paint(Graphics g){
	
		
		
		ImageIcon background = new ImageIcon("images//background.png");
	
		g.drawImage(background.getImage(),getX(),getY(),null);
		
		
		
		int x=370,y=100;
		
		
		if(circles[circlecount].isRunning() == true){
			circles[circlecount].setImagePath("images//New c//"+circlecount+".jpg");
			
		}
		
		circles[circlecount].draw(g);
		
	    
	
	    ++circlecount;
	    if(circlecount==4)
	    	circlecount=1;
	    
		if(dots[dotcount].isRunning() == true){
			dots[dotcount].setImagePath("images//rectangle//new r//"+circlecount+".jpg");
			
		}
		
		dots[dotcount].draw(g);
	
	    ++dotcount;
	    if(dotcount==4)
	    	dotcount=1;
	
	  
	    cc.draw(g);
	    cc1.draw(g);
	    cc2.draw(g);
	    
	    if(cc.isRunning()==true){
	    	ball.setImagePath("images//ball//violet.png");
	    }
	    
	    if(cc1.isRunning()==true){
	    	ball.setImagePath("images//ball//yellow.png");
	    }
	    if(cc2.isRunning()==true){
	    	ball.setImagePath("images//ball//blue.png");
	    }
	   
	    

	    
	    if(doublec[cccount].isRunning() == true){
			doublec[cccount].setImagePath("images//cc//ccstar//"+circlecount+".jpg");
			
		}
	    doublec[cccount].draw(g);
	  ++cccount;
	  if(cccount==4)
		  cccount=1;
	  
	    
	   cp.draw(g);
	   
	   g.setColor(Color.WHITE);
		g.drawString("Score::: " + score, 20, 300);
		ball.draw(g);
		
		
	}
    	
		
	
	public void startGame(){
		
	Sound.backgroundSound();
		
		while(true){

			ball.setY(ball.getY() + 25);
			
			
			super.repaint();
			
		
			try{
				
				Thread.sleep(550);
				
			}
			catch(Exception e){}
		
			
		}
		
		
	}


	public void checkCollision(){
		
		Rectangle ballRect = new Rectangle(ball.getX(),ball.getY(),23,23);
		
		Rectangle cRect = new Rectangle(cc.getX(),cc.getY(),39,35);
		Rectangle c1Rect = new Rectangle(cc1.getX(),cc1.getY(),39,35);
		Rectangle c2Rect = new Rectangle(cc2.getX(),cc2.getY(),39,35);
		for(int i = 0; i < circles.length; i++){
			for(int j=0;j<dots.length;j++){
		for(int k=0;k<doublec.length;k++){
			Rectangle circleRect = new Rectangle(circles[i].getX(),circles[i].getY(),51,51);
		
			Rectangle dotRect = new Rectangle(dots[j].getX(),dots[j].getY(),65,45);
			
			Rectangle ccRect = new Rectangle(doublec[k].getX(),doublec[k].getY(),101,93);
		
			
			if(ballRect.intersects(circleRect)== true){
				circles[i].setRunning(true);

				
				
			}
			else if(ballRect.intersects(dotRect)==true){
				dots[j].setRunning(true);

			
			}
			
			else if(ballRect.intersects(ccRect)==true){
				doublec[k].setRunning(true);

				
				
			}
			
			if(ballRect.intersects(cRect)){
				cc.setRunning(true);
				
			}
			
			if(ballRect.intersects(c1Rect)==true){
				cc1.setRunning(true);
			}
		
			if(ballRect.intersects(c2Rect)==true){
				cc2.setRunning(true);
			}
			
			
			}
		   
		
			
		}
		
		}
		score++;
		
	}

	
	public void keyPressed(KeyEvent e) {

		if(e.getKeyCode() == e.VK_UP){
			this.upKeyPressed = true;
			
			ball.setY(ball.getY() - 20);
			
			for(int i=0;i<circles.length;i++){
				for(int j=0;j<dots.length;j++){
					for(int k=0;k<doublec.length;k++){
				
				circles[i].setY(circles[i].getY()+1);
				dots[j].setY(dots[j].getY()+1);
				doublec[k].setY(doublec[k].getY()+1);
					}
				}
				
			}
			cc.setY(cc.getY()+25);
			cc1.setY(cc1.getY()+25);
			cc2.setY(cc2.getY()+25);
			cp.setY(cp.getY()+15);
			Sound.ballHitSound();
			
			for(int i=0;i<circles.length;i++){
				if(circles[i].getY()>700)
				circles[i].setY(circles[i].getY()-765);
				
				
				if(cc.getY()>700){
					cc.setY(cc.getY()-765);
				}
						
				for(int j=0;j<dots.length;j++){
					
					if(dots[j].getY()>700)
					{
					 dots[j].setY(dots[j].getY()-765);
					}
				}
				
				for(int k=0;k<doublec.length;k++){
					if(doublec[k].getY()>700){
						doublec[k].setY(doublec[k].getY()-765);
					}
				}
				if(cc2.getY()>700){
					cc2.setY(cc2.getY()-765);
				}
				
				if(cc1.getY()>700)
					cc1.setY(cc1.getY()-765);
				
			}
			
			
			checkCollision();
			
			
		}
		
		 

		
	}



	
	public void keyReleased(KeyEvent e) {
		if(e.getKeyCode() == e.VK_UP)
			this.upKeyPressed = false;
		
	
		
	}

	public void keyTyped(KeyEvent arg0) {
		
		
	}

}
