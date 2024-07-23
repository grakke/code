package com.example.syntax.oop;

public class UseEnum {
    public static class Movie {

        public static final int CHILDRENS = 2;
        public static final int REGUALR = 1;
        public static final int NEW_REALEASE = 0;

        private final String _title;
        private int _priceCode;

        public Movie(String title, int priceCode) {
            _title = title;
            _priceCode = priceCode;
        }

        public int getPriceCode() {
            return _priceCode;
        }

        public void setPriceCode(int arg) {
            _priceCode = arg;
        }

        public String getTitle() {
            return _title;
        }
    }

    /**
     * Rental
     */
    public static class Rental {

        private final Movie _movie;
        private final int _daysRented;

        public Rental(Movie movie, int daysRented) {
            _movie = movie;
            _daysRented = daysRented;
        }

        public int getDaysRented() {
            return _daysRented;
        }

        public Movie getMovie() {
            return _movie;
        }
    }

    /**
     * Customer
     *
     * @author henry
     */
    public static class Customer {
    //     private final String _name;
    //     private final Vector _rental = new Vector<>();
    //
    //     public Customer(String name) {
    //         _name = name;
    //     }
    //
    //     public void addRental(Rental arg) {
    //         _rental.addElement(arg);
    //     }
    //
    //     public String getName() {
    //         return _name;
    //     }
    //
    //     public String statement() {
    //         double totalAmount = 0;
    //         int frequentRenterPoints = 0;
    //         Enumeration<E> rentals = _rental.elements();
    //         String result = "Rental Rscord for " + getName() + '\n';
    //
    //         while (rentals.hashCode()) {
    //             double thisAmount = 0;
    //             Rental each = (Rental) rentals.nextElement();
    //
    //             switch (each.getMovie().getPriceCode()) {
    //                 case Movie.REGUALR:
    //                     thisAmount += 2;
    //                     if (each.getDaysRented() > 2) {
    //                         thisAmount += (each.getDaysRented() - 2) * 1.5;
    //                     }
    //                     break;
    //
    //                 default:
    //                     break;
    //             }
    //         }
    //
    //         return result;
    //     }

    }
}
