import datetime
import time
import board
import adafruit_dht
f = open("dados.txt", "a")
dhtDevice = adafruit_dht.DHT11(board.D4, use_pulseio=False)

# Initial the dht device, with data pin connected to:
# dhtDevice = adafruit_dht.DHT11(board.D4)

# you can pass DHT22 use_pulseio=False if you wouldn't like to use pulseio.
# This may be necessary on a Linux single board computer like the Raspberry Pi,
# but it will not work in CircuitPython.
while True:
    try:

        time.sleep(2.0)
        # Print the values to the serial port
        temperature_c = dhtDevice.temperature
        data = datetime.datetime.now()
        humidity = dhtDevice.humidity

        f.write("\nTemp: {:.1f} C    Humidity: {}%  data: {}".format(
                 temperature_c, humidity, data
            ))

    except RuntimeError as error:
        # Errors happen fairly often, DHT's are hard to read, just keep going
        print(error.args[0])
        time.sleep(2.0)
        continue
    except Exception as error:
        dhtDevice.exit()
        raise error
        time.sleep(2.0)


        f.close
