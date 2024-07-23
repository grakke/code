from pandas_datareader import data, wb

DAX = data.DataReader(name='^GDAXI', data_source='yahoo', start='2015-1-1')
DAX.info()
DAX['Close'].plot(figuresize=(8, 5))
