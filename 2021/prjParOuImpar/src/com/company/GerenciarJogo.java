package com.company;

import javax.swing.*;

public class GerenciarJogo {

    public static void main(String[] args) {
        JFrame tela = new JFrame("Par ou Impar");
        tela.setContentPane(new FormParImpar().getPanelParImpar());
        tela.setSize(400,500);
        tela.setDefaultCloseOperation(WindowConstants.EXIT_ON_CLOSE);
        tela.setLocation(200,200);
        tela.setVisible(true);
    }
}
