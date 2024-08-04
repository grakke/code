#pragma once

#include <armadillo>
#include <sstream>

namespace utils
{
    arma::Mat<double> make_covariance_matrix(const arma::Mat<double> &data);
    arma::Mat<double> make_shuffled_matrix(const arma::Mat<double> &data);
    arma::Col<double> compute_column_means(const arma::Mat<double> &data);
    void remove_column_means(arma::Mat<double> &data, const arma::Col<double> &means);
    arma::Col<double> compute_column_rms(const arma::Mat<double> &data);
    void normalize_by_column(arma::Mat<double> &data, const arma::Col<double> &rms);
    void enforce_positive_sign_by_column(arma::Mat<double> &data);
    std::vector<double> extract_column_vector(const arma::Mat<double> &data, long index);
    std::vector<double> extract_row_vector(const arma::Mat<double> &data, long index);
    void assert_file_good(const bool &is_file_good, const std::string &filename);
    template <typename T>
    void write_matrix_object(const std::string &filename, const T &matrix)
    {
        assert_file_good(matrix.quiet_save(filename, arma::arma_ascii), filename);
    }

    template <typename T>
    void read_matrix_object(const std::string &filename, T &matrix)
    {
        assert_file_good(matrix.quiet_load(filename), filename);
    }
    template <typename T, typename U, typename V>
    bool is_approx_equal(const T &value1, const U &value2, const V &eps)
    {
        return std::abs(value1 - value2) < eps ? true : false;
    }
    template <typename T, typename U, typename V>
    bool is_approx_equal_container(const T &container1, const U &container2, const V &eps)
    {
        if (container1.size() == container2.size())
        {
            bool equal = true;
            for (size_t i = 0; i < container1.size(); ++i)
            {
                equal = is_approx_equal(container1[i], container2[i], eps);
                if (!equal)
                    break;
            }
            return equal;
        }
        else
        {
            return false;
        }
    }
    double get_mean(const std::vector<double> &iter);
    double get_sigma(const std::vector<double> &iter);

    struct join_helper
    {
        static void add_to_stream(std::ostream &stream) {}

        template <typename T, typename... Args>
        static void add_to_stream(std::ostream &stream, const T &arg, const Args &...args)
        {
            stream << arg;
            add_to_stream(stream, args...);
        }
    };

    template <typename T, typename... Args>
    std::string join(const T &arg, const Args &...args)
    {
        std::ostringstream stream;
        stream << arg;
        join_helper::add_to_stream(stream, args...);
        return stream.str();
    }

    template <typename T>
    void write_property(std::ostream &file, const std::string &key, const T &value)
    {
        file << key << "\t" << value << std::endl;
    }

    template <typename T>
    void read_property(std::istream &file, const std::string &key, T &value)
    {
        std::string tmp;
        bool found = false;
        while (file.good())
        {
            file >> tmp;
            if (tmp == key)
            {
                file >> value;
                found = true;
                break;
            }
        }
        if (!found)
            throw std::domain_error(join("No such key available: ", key));
        file.seekg(0);
    }

} // utils