! Informations importantes, nom, dates et timezones
system name SwHopital
system location 2/10E
system contact "Bruyere Maximilien, Theo dubois"
system timezone CET
system daylight savings time enable
!!!!!!!!!!!!!!!! CHANGER CES DEUX LIGNES 
system date 12/17/2024
system time 2:31:50 

! Sécurité
session login-attempt 10
session login-timeout 20
session prompt default system-name

! Configurer la VLAN10
vlan 10 enable name general
ip interface general vlan 10 address 172.16.255.254 mask 255.255.0.0
vlan 10 port default 1/1-4

! Configurer la VLAN20
vlan 20 enable name pediatrie
ip interface pediatrie vlan 20 address 172.18.255.254 mask 255.255.0.0
vlan 20 port default 1/5-8

! Configurer la VLAN30
vlan 30 enable name si
ip interface si vlan 30 address 172.17.255.254 mask 255.255.0.0
vlan 30 port default 1/9-12

! Configurer la VLAN40
vlan 40 enable name rehabilitation
ip interface rehabilitation vlan 40 address 172.19.255.254 mask 255.255.0.0
vlan 40 port default 1/13-16

! Configurer la VLAN100
vlan 100 enable name commun
ip interface commun vlan 100 address 172.20.0.254 mask 255.255.0.0
vlan 100 port default 1/17-19

! Permettre de DHCP dans les autres sous-réseaux
ip service udp-relay

! Activer le DHCP snooping
ip helper dhcp-snooping enable