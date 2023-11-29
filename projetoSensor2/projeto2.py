import datetime
import time
import board
import adafruit_dht
import mysql.connector
import os
# Initial the dht device, with data pin connected to:
# dhtDevice = adafruit_dht.DHT11(board.D4)
# you can pass DHT22 use_pulseio=False if you wouldn't like to use pulseio.
# This may be necessary on a Linux single board computer like the Raspberry Pi,
# but it will not work in CircuitPython.

dhtDevice = adafruit_dht.DHT22(board.D4, use_pulseio=False)
day_old = 0
year_old = 0
month_old = 0
# Estabelecendo uma conexão com o banco de dados MySQL
db = mysql.connector.connect(
host='localhost',
database='termometro',
user='root',
password=''
)
while True:
    try:
        
        # Print the values to the serial port
	# Nomeando as temperaturas

        
        # Print the values to the serial port
	# Nomeando as temperaturas
        dateNow = datetime.datetime.now()
        temperature_c = dhtDevice.temperature
        humidity = dhtDevice.humidity
        now=time.localtime()
        year = now.tm_year
        month_str = (str(now.tm_mon).rjust(2, '0'))
        month = now.tm_mon
        # Nomeando os meses por escrito
        monthName = dateNow.strftime("%b")
	# Nomeando dia
        day_str = (str(now.tm_mday).rjust(2, '0'))
        day = now.tm_mday
	# Nomeando hora
        hour_str = (str(now.tm_hour).rjust(2, '0'))
        hour = now.tm_hour
        # Nomeando minuto
        min_str = (str(now.tm_min).rjust(2, '0'))
        minute = now.tm_min
        # Nomeando segundo
        sec_str = (str(now.tm_sec).rjust(2, '0'))
        second = now.tm_sec
        data_formatada = dateNow.strftime("%Y-%m-%d %H:%M:%S")
	# Atualiza o dia
        if day != day_old:
          day_old = day
          if month != month_old:
            month_old = month
            if year != year_old:
              year_old = year
              foldername =  ("{}_".format( year ))
              if not os.path.exists(foldername):
                os.mkdir(foldername)
            foldername_m = ("{}/{}_". format( foldername, month_str ))
            if not os.path.exists(foldername_m):
              os.mkdir(foldername_m)
          filename = ("{}/{}{}{}_dados.txt".format( foldername_m, year, monthName, day_str))
          # fechando conexão com arquivo
          f = open(filename, "a")
          f.close()
          # finaliza conexão
          db.close()
        else:
	# com uma funcao / metodo especifico para isso
        # Abrindo o arquivo para escrever
       	  f = open(filename, "a")
        # Escrevendo no arquivo as informações
          f.write("Temperatura: {:.1f} ºC  Humidade: {} %  Horário: {}:{}:{}  Data: {}/{}/{}\n".format(
                temperature_c, humidity, hour_str, min_str, sec_str, day_str, month_str, year
            ))

          db = mysql.connector.connect(
          host='localhost',
          database='termometro',
          user='root',
          password=''
          )

          # Criando um cursor para executar consultas SQL
          cursor = db.cursor()

          # Definindo os valores a serem inseridos
          temperatura = temperature_c
          umidade = humidity
          tempo = data_formatada

          # Criando a consulta SQL com placeholders (%s) para os valores
          consulta = "INSERT INTO dados (temperatura, umidade, tempo) VALUES (%s, %s, %s)"

          # Executando a consulta com os valores substituídos
          cursor.execute(consulta, (temperatura, umidade, tempo))

          # Confirmar a transação
          db.commit()
        # Cooldown da função
          time.sleep(300.0)
    except RuntimeError as error:
        # Errors happen fairly often, DHT's are hard to read, just keep going
        print(error.args[0])

