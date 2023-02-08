# MongoDB Replica Set
Creazione di un **Replica Set** su tre macchine virtuali diverse,  specificatamente CONTAINER di PROXMOX.

Ogni container eseguirà un DOCKER ENGINE,  in modo da esporre il Docker ufficiale di mongodb. Questo permette di evitare la difficoltosa installazione di mongo sulla macchina, visto che esiste già pronta.

L’intero progetto è disponibile su [GITHUB](https://github.com/ilDug/docker-utils/tree/main/mongodb-rs) : 

Aggiungo un immagine per vedere che effetto che fa.
![images](../1001-hello-world/hw.jpg)

# 1 - Creazione dei container su ProxMoX

> Creazione di tre container,  ognuno dei quali esegurà il docker di mongodb. Le tre macchine devono condividere una cartella comune,  magari salvata in un posto sicuro su NAS,  dove sono cntenuti i file per eseguire docker, nonchè le chiavi.

## Cartella condivisa

Su ProxMox creare, in un percorso condivisibile e comune, una cartella per il replica set di mongodb. D’ora in poi si lavorerà su questa cartella.


## DNS

preparare il necessario per puntare alla rete locale gli indirizzi delle tre macchine 

| HOSTNAME | FQDN           | IP            |
| -------- | -------------- | ------------- |
| mongoct1 | mongo1.dag.lan | 10.0.0.201/24 |
| mongoct2 | mongo2.dag.lan | 10.0.0.202/24 |
| mongoct3 | mongo3.dag.lan | 10.0.0.202/24 |

## Containers LXC

Lo script ```script``` seguente crea un container su proxmox. Se si dispone di un cluster creare un container per ogni nodo proxmox. Se si ha a disposizioneun solo hypervisor,  creare tre cointainer differenti.

*mongo-pct.create.bash* 

    #! bash
    
    #variabili
    ID=201
    HOSTNAME=mongoct1
    PASSWORD=adsadsekdocker
    MEMORY=1024
    DISK=8
    IP=10.0.0.201/24
    
    #creazione del container proxmox
    pct create $ID /path/to/container/template/ubuntu-20.04-standard_20.04-1_amd64.tar.gz \
        --arch amd64 \
        --ostype ubuntu \
        --storage local-zfs \
        --hostname $HOSTNAME \
        --password $PASSWORD \
        --cores 4  \
        --memory $MEMORY \
        --swap 0 \
        --rootfs local-zfs:$DISK \
        --net0 name=eth0,bridge=vmbr0,gw=10.0.0.1,ip=$IP,firewall=1 \
        --nameserver 10.0.0.101 \
        --searchdomain dag.lan \
        --features nesting=1 \
        --onboot 1 \
        --unprivileged 1 \
    
    # MOUNT POINTS
    pct set $ID -mp0 /mnt/shared/app/folder/,mp=/app,shared=1,replicate=0 \
    pct start $ID
    
    # configurazione di Ubuntu TIMEZONE
    pct exec $ID -- bash -c "timedatectl set-timezone Europe/Rome"
    
    #modifica il file di configurazione di SSH per permettere il collemgamento dall'esterno
    pct exec $ID -- bash -c "sed -i 's/#PermitRootLogin prohibit-password/PermitRootLogin yes/' /etc/ssh/sshd_config"
    pct exec $ID -- bash -c "systemctl restart ssh.service"
    
    pct exec $ID -- bash -c "apt-get update && apt-get upgrade -y"
    pct exec $ID -- bash -c "apt-get install -y  nfs-common  nfs-kernel-server  cifs-utils  vim  software-properties-common  curl"
    pct exec $ID -- bash -c "passwd root"


# 2- Installazione di DOCKER ENGINE

é sempre meglio controllare se ci sono aggiornamenti nell’installazione di DOCKER engine sul sito di docker.io.
Lo script suggerito è questo,  da eseguire all’interno del container:

*docker-install.bash* 

    #! bash
    
    # DOCKER installation (COME DA ISTRUZIONI DEL SITO DOCKER)
    ## SET UP THE REPOSITORY
    apt-get remove docker docker-engine docker.io containerd runc
    apt-get update
    apt-get install -y \
        apt-transport-https \
        ca-certificates \
        curl \
        gnupg \
        lsb-release
    
    curl -fsSL https://download.docker.com/linux/ubuntu/gpg | sudo gpg --dearmor -o /usr/share/keyrings/docker-archive-keyring.gpg
    
    echo \
      "deb [arch=$(dpkg --print-architecture) signed-by=/usr/share/keyrings/docker-archive-keyring.gpg] https://download.docker.com/linux/ubuntu \
      $(lsb_release -cs) stable" | sudo tee /etc/apt/sources.list.d/docker.list > /dev/null
    
    apt-get update
    apt-get install docker-ce docker-ce-cli containerd.io
    
    #Configure Docker to start on boot
    systemctl enable docker.service
    systemctl enable containerd.service
    
    ## INSTALL DOCKER COMPOSE
    sudo curl -L "https://github.com/docker/compose/releases/download/1.29.2/docker-compose-$(uname -s)-$(uname -m)" -o /usr/local/bin/docker-compose
    
    chmod +x /usr/local/bin/docker-compose
    docker-compose --version


# 3 - Preparazione dell’ambiente DOCKER

Entrare all’interno del container **primario** . Esso dovrebbe già avere la cartella condivisia che punta a “/app”.  In essa si deve eseguire lo script che costruirà l’ambiente di esecuzione di docker. Si usa Docker Compose.


## impostazione delle cartelel e delle chiavi

si deve creare la chiave di connessione comune utilizzando il seguente comando:

*generate-key.bash* 

    #! bash
    
    echo "creazione delle variabili di sistema"
    echo "MONGO_ROOT_PW=$(openssl rand -base64 21)" > .env
    cat .env
    echo "password root generata"
    echo "......"
    echo "generazione della key e delle cartelle"
    mkdir key backup
    openssl rand -base64 756 > key/mongo_key_file
    chmod 400 key/mongo_key_file


## docker-compose

*docker-compose.yaml* 

    version: "3.9"
    
    services:
      mongodb:
        image: mongo:5
        restart: always
        container_name: mongodb
        # environment:
        #   MONGO_INITDB_ROOT_USERNAME: root
        #   MONGO_INITDB_ROOT_PASSWORD_FILE: /run/secrets/MONGO_ROOT_PW
        ports:
          - 27017:27017
        expose:
          - "27017"
        volumes:
          - mongodata:/data/db
          - /var/mongo:/var/mongo
        entrypoint: [ "/usr/bin/mongod", "--keyFile", "/var/mongo/key/mongo_key_file", "--replSet", "rs0", "--bind_ip_all"]
        networks:
          - mongonet
    
    volumes:
      mongodata:
    
    networks:
      mongonet:
        name: mongonet

Spiegazione: 

- non si usano le password per gli utenti, ma una chiave condivisa.
- si espone la porta ordinario di mongodb, che non deve essere in conflitto con altre porte già aperte.
- si attaccano i volumi per la cartella dell’applicazione che contienre la chiave **/app**.
- si attacca il volume gestito da DOCKER per il salvataggio dei dati **mongodata** 


# 4 - Replica Set

Avviare tutti i docker-compose.

    docker-compose up 

Nel nodo/host PRIMARY entrare ed eseguire i comandi per configurare il replica Set. all’interno del docker.


    docker exec -it mongodb bash

una volta dentro il container, aprire la shell di mongo (**mongosh**)  ed eseguire le seguenti impostazioni:

    rsconf = {
        _id: "rs0",
        members: [
            {
                "_id": 0,
                "host": "mongo1.dag.lan:27017",
                "priority": 1
            },
            {
                "_id": 1,
                "host": "mongo2.dag.lan:27017",
                "priority": 1
            },
            {
                "_id": 2,
                "host": "mongo3.dag.lan:27017",
                "priority": 1
            }
        ]
    }
    
    rs.initiate(rsconf)
    rs.conf()
    rs.status()


## Utente ROOT

la password dell’utente root è generata in automatico e salvata nel file *.env* . Va usata nella creazione dell’utente. In automatico il database per l’amministrazojne è chiamato *admin.*
Sempre nella shell di mongo (mongosh) eseguire:

    admin = db.getSiblingDB("admin")
    admin.createUser(
        {
            user: "root",
            pwd: "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxx",
            roles: [
                { db: "admin", role: "userAdminAnyDatabase"},
                { db: "admin", role: "dbAdminAnyDatabase" },
                { db: "admin", role: "clusterAdmin" },
                { db: "admin", role: "root" },
            ]
        }
    )
    db.grantRolesToUser("root", [
        { db: "admin", role: "userAdminAnyDatabase"},
        { db: "admin", role: "dbAdminAnyDatabase" },
        { db: "admin", role: "clusterAdmin" },
        { db: "admin", role: "root" },
    ])
    rs.conf()
    rs.status()

In un container SECONDARY abilitare la lettura dagli altri nodi sempre dalla shell di mongo :

    rs.secondaryOk() 


# 5 - Connection string e utenti

entrando un uno dei docker con il comando: 


    docker exec -it mongodb bash
    
    mongosh

si possono eseguire le operazioni.

## Add User

nella shell di mongo (mongosh) si possono aggiungere gli utenti


    use mydb
    db.createUser({ 
        user: "myusername" , 
        pwd: "xxxxxxxx", 
        roles: [
            { db: "mydb", role: "readWrite" },
            { db: "mydb", role: "dbOwner" },
        ]
    })
    
    db.changeUserPassword("myusername", passwordPrompt())


## Connection string

Sostituire l’username e la password con quelle dell’utente scelto. **Nel caso di root non serve indicare il nome del database.**


    mongodb://username:PASSWORD@mongo1.dag.lan:27017,mongo2.dag.lan:27017,mongo3.dag.lan:27017/databasename?authSource=admin&replicaSet=rs0



# Backup
    docker exec -it CONTAINERNAME bash
    
    mongodump    -v -u root -p password --authenticationDatabase admin -d database -c collection -o=/backup/20211101_1 
    
    mongorestore -v -u root -p password --authenticationDatabase admin --nsInclude="blog.posts" --drop --dir=/backup/20211101_1/ --dryRun
    
    mongoexport  -v -u root -p password --authenticationDatabase admin -d database -c collection --jsonArray --pretty -o=/backup/nomefile.json
    
    mongoimport  -v -u root -p password --authenticationDatabase admin -d database -c collection --jsonArray --file=/backup/nomefile.json


oppure direttamente dall’host

    docker exec <mongodb container> sh -c 'mongodump --authenticationDatabase admin -u <user> -p <password> -d <database> --archive' > ./backup/db.dump
    
    docker exec -i <mongodb container> sh -c 'mongorestore --authenticationDatabase admin -u <user> -p <password> -d <database> --archive' < db.dump

Aggiornamento effettuato durante l’impostazione del server in EURO-KEMICAL.  Ho integrato un sistema di back up in automatico impostando un CRONTAB che esegue sul container (non il docker) il comando per il backup. 
Vedi nel server proxmox di EK.

