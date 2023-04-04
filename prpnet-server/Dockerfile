FROM debian:latest AS builder

# gcc g++ make for compiling
# unixodbc unixodbc-dev for DB connection
# dpkg-dev lsb-release wget for MySQL driver setup
# subversion for code checkout
# gettext for envsubst functionality
RUN apt-get update && apt-get install -y gcc g++ make \
    unixodbc unixodbc-dev \
    dpkg-dev lsb-release wget \
    subversion gettext

WORKDIR /prpnet-server-builder

# Get latest PRPNet code from sourceforge
RUN svn checkout https://svn.code.sf.net/p/prpnet/code/ .

# Use custom makefile
COPY ./makefile ./source/makefile

RUN cd ./source && make prpserver prpadmin

FROM builder AS prpnetserver

WORKDIR /prpnet-server

COPY --from=builder /prpnet-server-builder/source/prpserver /prpnet-server/prpserver
COPY --from=builder /prpnet-server-builder/source/prpadmin /prpnet-server/prpadmin

# Setup MySQL drivers
RUN export DEBIAN_FRONTEND=noninteractive && \
    wget https://dev.mysql.com/get/mysql-apt-config_0.8.24-1_all.deb && \
    dpkg -i mysql-apt-config_0.8.24-1_all.deb && \
    apt-get update && \
    apt-get install mysql-community-client-plugins && \
    wget https://dev.mysql.com/get/mysql-connector-odbc_8.0.32-1debian11_amd64.deb && \
    dpkg -i mysql-connector-odbc_8.0.32-1debian11_amd64.deb

RUN chmod +x ./prpserver

COPY ./prpserver.delay ./database.conf ./prpserver.conf ./docker-entrypoint.sh ./waitforit.sh ./
RUN chmod +x ./docker-entrypoint.sh ./waitforit.sh

ENTRYPOINT ["./docker-entrypoint.sh"]
