# Partition Almalinux - Serveur Linux Global

| Données  |     Type de périphérique     | Système de fichiers | Stockage | Chiffré | Options de montage |
| :--------------- |:---------------:|:-----:|:-----:|:-----:|:-----:|
| /backup  |   **LVM [Almalinux]**      |  **xfs** | 5Go | non | defaults,noexec,nosuid,nodev,relatime |
| /home | **LVM [Almalinux]** | **ext4** | 2Go | oui | defaults,noexec,nosuid,nodev,relatime |
| /web | **LVM [Almalinux]** | **xfs** | 3Go | oui | defaults,noexec,nosuid,nodev,relatime |
| /database| **LVM [Almalinux]** | **xfs**| 2Go | oui | defaults,noexec,nosuid,nodev,relatime |

| Système  |     Type de périphérique     | Système de fichiers | Stockage | Chiffré | Options de montage |
| :--------------- |:---------------:|:-----:|:-----:|:-----:|:-----:|
| / | **LVM [Almalinux]**   | **xfs** | 5Go | oui | defaults,nodev |
| /boot | **Partition Standard** | **ext4** | 1024Mo | non | defaults,ro,nodev,nosuid,noexec |
| /tmp | **LVM [Almalinux]** | **ext4** | 1024Mo | non | defaults,noexec,nosuid,nodev |
| /var | **LVM [Almalinux]** | **ext4** | 3Go | oui | defaults,noexec,nosuid,nodev |
| biosboot | **Partition standard** | **Bios Boot** | 2 Mo | non | / |
| swap | **LVM [Almalinux]** | **swap** | 4Go | non | defaults |

### Services installés et configurés

- **SSH key** : Utilisation de clés ssh pour une connexion sécurisée.
- **Audit** : Configuration de l'audit pour surveiller les changements dans les fichiers critiques.
- **Rootkit** : Installation et configuration de `rkhunter` et `chkrootkit` pour la détection des rootkits.
- **Tests de sécurité** : Installation et exécution de `lynis` pour les audits de sécurité.
- **ClamAV** : Installation et configuration de l'antivirus ClamAV.
- **Fail2Ban** : Installation et configuration de Fail2Ban pour la protection contre les attaques par force brute.
- **Nmap** : Installation et configuration de Nmap pour l'analyse des ports.
- **GRUB** : Configuration de GRUB avec un utilisateur et un mot de passe.
- **Fstab** : Configuration des options de montage pour les partitions.
- **MariaDB** : Installation et configuration de MariaDB.
- **Django** : Utilisation de python pour le web.
- **Cockpit** : Web UI pour la configuration du serveur linux.
- **SELINUX** : Sécurisation des services.
