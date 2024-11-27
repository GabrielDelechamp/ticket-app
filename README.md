# Application de Gestion de Tickets  

## Comptes de Connexion  

### Admin  
- **Email** : admin@admin.com  
- **Mot de passe** : password  

### Client  
- **Email** : client@client.com  
- **Mot de passe** : password  

### Développeur  
- **Email** : dev@dev.com  
- **Mot de passe** : password  

---

## Fonctionnalités Implémentées  

### Client  
- Connexion à l'application.  
- Consultation et gestion de ses propres tickets.  
- Création d'un nouveau ticket avec les champs obligatoires suivants :  
  - **Titre**  
  - **Texte explicatif**  
  - **Catégorie**  
  - **Priorité**  
  - Le statut est automatiquement défini à **"Ouvert"**.  
- Possibilité de modifier le statut d'un ticket à **"Terminé"** une fois résolu ou à **"Annulé"** en cas d'abandon.  

### Administrateur  
- Connexion à l'application.  
- Visualisation de tous les tickets avec leurs détails et leur état.  
- Attribution des tickets à un développeur. Le statut du ticket passe alors à **"Affecté"**.  

### Développeur  
- Connexion à l'application.  
- Consultation de tous les tickets qui lui sont affectés et qui ne sont pas résolus.  
- Ajout de commentaires à un ticket. Le client est automatiquement notifié par email.  
- Gestion des échanges avec le client via des commentaires.  

---

## Fonctionnalités Non Implémentées  

- **Notifications Mail** :  
  - Les administrateurs ne sont pas notifiés par email lors de la création d'un ticket.  
  - Le développeur affecté à un ticket n'est pas notifié par email.  
- **Pièces Jointes** :  
  - Les échanges entre le client et le développeur ne peuvent pas encore inclure de pièces jointes.  
  - Il n'est pas possible d'ajouter des pièces jointes lors de la création d'un ticket.  

