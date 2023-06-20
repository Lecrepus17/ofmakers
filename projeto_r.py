                                                                                                    test.py                                                                                                                 
import datetime
import time
import board
import adafruit_dht
import os
import os.path
# Initial the dht device, with data pin connected to:
# dhtDevice = adafruit_dht.DHT11(board.D4)

# you can pass DHT22 use_pulseio=False if you wouldn't like to use pulseio.
# This may be necessary on a Linux single board computer like the Raspberry Pi,
# but it will not work in CircuitPython.

dhtDevice = adafruit_dht.DHT22(board.D4, use_pulseio=False)
day_old = 0
year_old = 0
month_old = 0
while True:
    try:
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

        # Nomeando e  atualizando data do arquivo e pasta
        if day != day_old:
          day_old = day
          if month != month_old:
            month_old = month
            if year != year_old:
              year_old = year
<<<<<<< HEAD
              foldername =  ("{}{}_".format( year ))
=======
              foldername =  ("{}_".format( year ))
>>>>>>> 48c06ee0b5f604fe07e22f3dff9fceb2665c3374
              if os.path.exists(foldername):
              else:
                os.mkdir(foldername)
            foldername_m = ("{}/{}_". format( foldername, month_str ))
            if os.path.exists(foldername_m):
            else:
              os.mkdir(foldername_m)
          filename = ("{}/{}{}{}_dados.txt".format( foldername_m, year, monthName, day_str))
<<<<<<< HEAD
=======
          f = open(filename, "a")
          f.close
>>>>>>> 48c06ee0b5f604fe07e22f3dff9fceb2665c3374
        else:
        # com uma funcao / metodo especifico para isso
        # Abrindo o arquivo para escrever
          f = open(filename, "a")
        # Escrevendo no arquivo as informações
          f.write("Temperatura: {:.1f} ºC  Humidade: {} %  Horário: {}:{}:{}  Data: {}/{}/{}\n".format(
                temperature_c, humidity, hour_str, min_str, sec_str, day_str, month_str, year
            ))
        # Cooldown da função
          time.sleep(10.0)
    except RuntimeError as error:
        # Errors happen fairly often, DHT's are hard to read, just keep going
        print(error.args[0])



