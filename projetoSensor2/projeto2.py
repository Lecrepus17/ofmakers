import datetime
import time
import board
import adafruit_dht
import mysql.connector
# Initial the dht device, with data pin connected to:
# dhtDevice = adafruit_dht.DHT11(board.D4)
# you can pass DHT22 use_pulseio=False if you wouldn't like to use pulseio.
# This may be necessary on a Linux single board computer like the Raspberry Pi,
# but it will not work in CircuitPython.

dhtDevice = adafruit_dht.DHT11(board.D4, use_pulseio=False)
day_old = 0
# Estabelecendo uma conexão com o banco de dados MySQL
db = mysql.connector.connect(
host='localhost',
database='termometro',
user='user',
password='123'
)
while True:
    try:
        
        # Print the values to the serial port
	# Nomeando as temperaturas
        dateNow = datetime.datetime.now()
        data_formatada = dateNow.strftime("%Y-%m-%d %H:%M:%S")
        temperature_c = dhtDevice.temperature
        humidity = dhtDevice.humidity
        now=time.localtime()
        day = now.tm_mday
	# Atualiza o dia
        if day != day_old:
          day_old = day
          if month != month_old:
            month_old = month
            if year != year_old:
              year_old = year
              foldername =  ("{}_".format( year ))
              if os.path.exists(foldername):
              else:
                os.mkdir(foldername)
            foldername_m = ("{}/{}_". format( foldername, month_str ))
            if os.path.exists(foldername_m):
            else:
              os.mkdir(foldername_m)
          filename = ("{}/{}{}{}_dados.txt".format( foldername_m, year, monthName, day_str))
          # fechando conexão com arquivo
          f = open(filename, "a")
          f.close
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
          time.sleep(10.0)
    except RuntimeError as error:
        # Errors happen fairly often, DHT's are hard to read, just keep going
        print(error.args[0])
        

