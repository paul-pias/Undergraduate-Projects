package game;

import java.awt.Graphics;
import java.awt.Rectangle;

public class Firing extends Thread {
	
	private Ball ball;
	private Window window;
	private Circle[] circles;
	private Dot[]dots;
	private CC[] dcc;
	ColorChanger cc;
	ColorChanger cc1;
	ColorPic cp;
	
	
	public Firing(Ball ball,Window window,Circle[] circles,Dot[]dots,CC[] dcc){
		this.ball=ball;
		this.window=window;
		this.circles=circles;	
		this.dots=dots;
		this.dcc=dcc;
	}
  
	
	
	public void run(){
		
		while(true){
			
			try{
				Thread.sleep(140);
			}
			catch(Exception e){}
			
			window.repaint();
		}
		
		
	}
	
	


}
	
	

