package com.company;

import javax.swing.*;
import java.awt.event.MouseAdapter;
import java.awt.event.MouseEvent;
import java.util.Random;

public class FormParImpar {
    private JPanel panelParImpar;
    private JButton btnPar;
    private JButton btnImpar;
    private JLabel lblNum;
    private JLabel lblPontuacao;

    public JPanel getPanelParImpar() {
        return panelParImpar;
    }

    static int pontuacao = 0;

    Random r = new Random();
    int randomNum;

    public FormParImpar() {
        btnImpar.addMouseListener(new MouseAdapter() {
            @Override
            public void mouseClicked(MouseEvent e) {
                randomNum = r.nextInt(50);
                lblNum.setText(String.valueOf(randomNum));
                int num = Integer.parseInt(lblNum.getText());

                if (num % 2 != 0){
                    pontuacao+=10;
                    lblPontuacao.setText(String.valueOf(pontuacao));
                    randomNum = r.nextInt(50);
                }else{
                    JOptionPane.showMessageDialog(null,"Você Perdeu, sua pontuação foi de: " + pontuacao);
                    pontuacao = 0;
                    lblPontuacao.setText("");
                    randomNum = r.nextInt(50);
                    lblNum.setText(String.valueOf(randomNum));
                }
            }
        });
        btnPar.addMouseListener(new MouseAdapter() {
            @Override
            public void mouseClicked(MouseEvent e) {
                randomNum = r.nextInt(50);
                lblNum.setText(String.valueOf(randomNum));
                int num = Integer.parseInt(lblNum.getText());

                if (num % 2 == 0){
                    pontuacao+=10;
                    lblPontuacao.setText(String.valueOf(pontuacao));
                    randomNum = r.nextInt(50);
                }else{
                    JOptionPane.showMessageDialog(null,"Você Perdeu, sua pontuação foi de: " + pontuacao);
                    pontuacao = 0;
                    lblPontuacao.setText("");
                    randomNum = r.nextInt(50);
                }
            }
        });
    }
}
