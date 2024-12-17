# Configuration générale (Fedora 40 Server Edition)
----

## Général

- Stockage : 30Go + 30Go (RAID)
- Root désactivé
- Mot de passe par défault (**démarrage**) : "G4Linux"
- Mot de passe utilisateur :
    - bruyere.maximilien : **bruyereG4Linux**
    - denis.cyril : **denisG4Linux**
    - dubois.theo : **duboisG4Linux**
    - duchesne.guillaume : **duchesneG4Linux**
    - mauroit.antoine : **mauroitG4Linux**

## Partitionnement

### Les partitions

| Données  |     Type de périphérique     | Système de fichiers | Stockage | Chiffré | Options de montage |
| :--------------- |:---------------:|:-----:|:-----:|:-----:|:-----:|
| /backup  |   **LVM [Fedora]**      |  **xfs** | 10Go | non | defaults,noexec,nosuid,nodev,relatime |
| /home | **RAID 1**| **ext4** | 2Go x 2 | oui | defaults,noexec,nosuid,nodev,relatime |
| /web | **RAID 1**| **ext4** | 3Go x 2 | oui | defaults,noexec,nosuid,nodev,relatime |

| Système  |     Type de périphérique     | Système de fichiers | Stockage | Chiffré | Options de montage |
| :--------------- |:---------------:|:-----:|:-----:|:-----:|:-----:|
| / | **RAID 1** | **xfs** | 8Go x 2 | oui | defaults,nodev |
| /boot | **RAID 1** | **ext4** | 1024Mo x 2| non | defaults,ro,nodev,nosuid,noexec |
| /tmp | **LVM [Fedora]** | **ext4** | 1024Mo | non | defaults,noexec,nosuid,nodev |
| /var | **RAID 1** | **ext4** | 3Go x 2 | oui | defaults,noexec,nosuid,nodev |
| /boot/efi | **Partition standard** | **EFI System partition** | 1024 Mo | non | / |
| swap | **LVM [Fedora]** | **swap** | 4Go | non | defaults |

### Explications des options de montage

- **noexec** : Empêche l’exécution de fichiers binaires sur cette partition. Utile pour éviter l’exécution de scripts malveillants.
- **nosuid** : Empêche l’escalade de privilèges via les fichiers setuid.
- **nodev** : Empêche la création de périphériques spéciaux sur cette partition.
- **relatime** : Met à jour les timestamps d’accès aux fichiers de manière relative, ce qui peut améliorer les performances sans compromettre la sécurité.
- **ro (read-only)** : Monte la partition en lecture seule pour éviter toute modification accidentelle ou malveillante.

## Plan de sauvegarde Linux

### Questions
1. Que faut-il sauvegarder ?  

`/etc`,`/web`,`/var`,`/home`,`/root`

2. Avec quelle fréquence ?  

Chaque jour à 12h pendant la pause.

3. Combien de temps conservera-t-on les sauvegardes, en combien d'exemplaires ?  

Les sauvegardes seront effacées après 1 semaine.

4. A quel endroit seront stockées les sauvegardes et l'historique des sauvegardes ?  

Les sauvegardes seront stockées dans une partition à part : `/backup`

5. Quels sont les besoins, en capacité, du support de sauvegarde ?  

6. Combien de temps, au plus, doit durer la sauvegarde ?  

Elles doivent **au maximum** durer 5-10 minutes.

7. Combien de temps prévoit-on pour restaurer un fichier, un système de fichiers, est-ce 
raisonnable ?  

La restauration devra prendre **au maximum** 20 minutes

8. La sauvegarde doit-elle être automatique ou manuelle ?  

Les sauvegardes seront automatisées chaque jour à 12h pendant le repas. 
Il sera possible de les faire manuellement grâce à la commande `dailybackup`.

9. Quelle est la méthode de sauvegarde la plus appropriée ?  

La méthode de sauvegarde la plus appropriée est la sauvegarde incrémentielles car
elle met à jour seulement les fichiers modifiés grâce à la commande `rsync`. Elle 
est appropriée pour réduire le temps de sauvegarde et l'espace de stockage nécessaire.

10.  Quel est le support le plus approprié ?  

Il aurait été approprié de prendre un serveur de backup à part mais dans le cadre de ce 
projet, il est préférable de n'utiliser qu'une simple partition dans le but de stocker 
les données.

## Configuration des services

### Services installés et configurés

- **Audit** : Configuration de l'audit pour surveiller les changements dans les fichiers critiques.
- **Rootkit** : Installation et configuration de `rkhunter` et `chkrootkit` pour la détection des rootkits.
- **Tests de sécurité** : Installation et exécution de `lynis` pour les audits de sécurité.
- **ClamAV** : Installation et configuration de l'antivirus ClamAV.
- **Fail2Ban** : Installation et configuration de Fail2Ban pour la protection contre les attaques par force brute.
- **Nmap** : Installation et configuration de Nmap pour l'analyse des ports.
- **GRUB** : Configuration de GRUB avec un utilisateur et un mot de passe.
- **Fstab** : Configuration des options de montage pour les partitions.
- **FTP** : Configuration de SFTP avec chroot pour les utilisateurs.
- **HTTPD** : Installation et configuration d'Apache HTTP Server avec SSL.
- **MariaDB** : Installation et configuration de MariaDB.
- **PHPMyAdmin** : Installation et configuration de PHPMyAdmin.
- **Cockpit** : Web UI pour la configuration du serveur linux.
- **SELINUX** : Sécurisation des services.

### Notes supplémentaires

- Les utilisateurs créés sont ajoutés au groupe `apache` pour l'accès au serveur web.
- Les variables de configuration du script sont stockées dans le fichier `config.conf`.