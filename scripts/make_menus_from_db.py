#!/usr/bin/env python3
# -*- coding: utf-8 -*-
"""
Created on Thu Nov  4 16:37:20 2021

@author: kjohnson
"""
import pandas as pd

df = pd.read_csv("nametourl.csv", index_col=1)  

section_names = ["Section_intro.html","Section_IPA.html","Section_examples.html","Section_acoustic.html",
                 "Section_prosody.html","Section_articulation.html","Section_aerodynamics.html",
                 "Section_audition.html"]

section_titles = ["Start Here","The IPA","Language Examples", "Acoustic Theory of Speech Production",
                  "Prosody", "Articulatory Phonetics", "Aerodynamic Phonetics","Auditory Phoentics"]

