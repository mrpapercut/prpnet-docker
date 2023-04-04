FROM debian:latest AS builder

RUN apt-get update && apt-get install -y gcc g++ make \
    unixodbc unixodbc-dev \
    dpkg-dev lsb-release wget

WORKDIR /prpnet-server

COPY ./mysql-apt-config_0.8.24-1_all.deb ./
COPY ./mysql-connector-odbc_8.0.32-1debian11_amd64.deb ./

RUN export DEBIAN_FRONTEND=noninteractive && \
    dpkg -i mysql-apt-config_0.8.24-1_all.deb && \
    apt-get update && \
    apt-get install mysql-community-client-plugins && \
    dpkg -i mysql-connector-odbc_8.0.32-1debian11_amd64.deb

COPY ./prpnet-code-r112/source ./

# RUN make all
RUN make prpserver prpadmin

RUN chmod +x ./prpserver

COPY ./waitforit.sh ./docker-entrypoint.sh ./
RUN chmod +x ./waitforit.sh ./docker-entrypoint.sh

ENTRYPOINT ["./docker-entrypoint.sh"]
