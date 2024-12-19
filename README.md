# Projet Interdisciplinaire : Service Réhabilitation

## Contexte
Ce projet a été réalisé dans le cadre de nos études en **Informatique BAC-2** à la HEH (Haute École en Hainaut). Il s'inscrit dans une simulation professionnelle visant à concevoir une infrastructure réseau et des systèmes informatiques pour un hôpital. Notre groupe représente le **Service Réhabilitation**, spécialisé dans la gestion des séjours longue durée et des équipements de rééducation.

## Réalisations Techniques
### Configuration réseau
- Mise en place des VLAN spécifiques (VLAN 40 pour le service réhabilitation) et leur intégration au VLAN commun.
- Configuration du routage entre les VLANs.

### Serveurs Windows et Linux
- **Serveur Windows Local** : Configuration de DNS secondaire et DHCP failover.
- **Serveur Linux Local** : Hébergement des applications web (Apache/Nginx) et gestion des bases de données locales.
- **Serveurs Communs** : Centralisation des services DNS, DHCP et Active Directory (VLAN 100).
- **Travail approfondi sur les serveurs globaux** : Configuration et optimisation du Windows Server commun et du Linux commun pour assurer une synchronisation efficace et une gestion centralisée des services critiques.

### Développement d'applications
- Création d’une interface CRUD en PHP pour la gestion des données locales (équipements, séjours).
- Synchronisation des données locales avec une base de données centrale.

### Sécurité
- Gestion des accès et permissions via Active Directory.
- Validation des connexions et des données selon les normes apprises.

### Documentation
- Production de diagrammes UML, modélisation de bases de données, et rapports techniques détaillés.

## Membres de l'équipe
- Antoine Mauroit
- Guillaume Duchesne
- Maximilien Bruyère
- Théo Dubois
- Cyril Denis

## Objectifs
- Simuler un environnement professionnel pour mettre en pratique les compétences en réseau, systèmes et développement.
- Construire une infrastructure fiable et sécurisée pour répondre aux besoins du service réhabilitation.
- Collaborer efficacement avec les autres départements (Hôpital Général, Pédiatrie, Soins Intensifs) pour garantir l’intégrité des données et des services.
