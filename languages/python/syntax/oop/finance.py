class FinancialInstrument(object):
    def __init__(self, symbol, price):
        self.symbol = symbol
        self.__price = price

    def get_price(self):
        return self.__price

    def set_price(self, price):
        self.__price = price


class PortfolioPosition(object):
    def __init__(self, financial_instrument, position_size):
        self.position = financial_instrument
        self.__position_size = position_size

    def get_position_size(self):
        return self.__position_size

    def update_position_size(self, position_size):
        self.__position_size = position_size

    def get_position_value(self):
        return self.__position_size * self.position.get_price()


fi = FinancialInstrument('AAPL', 100)
pp = PortfolioPosition(fi, 10)
print(pp.get_position_size())

pp.get_position_value()
print(pp.position.get_price())

pp.position.set_price(105)
print(pp.get_position_value())
