#pragma once

#include <armadillo>
#include <string>
#include <vector>

class pca
{
public:
    pca();
    explicit pca(long num_vars);
    virtual ~pca();

    bool operator==(const pca &other);

    void set_num_variables(long num_vars);
    long get_num_variables() const;
    void add_record(const std::vector<double> &record);
    std::vector<double> get_record(long record_index) const;
    long get_num_records() const;
    void set_do_normalize(bool do_normalize);
    bool get_do_normalize() const;
    void set_solver(const std::string &solver);
    std::string get_solver() const;

    void solve();

    double check_eigenvectors_orthogonal() const;
    double check_projection_accurate() const;

    void save(const std::string &basename) const;
    void load(const std::string &basename);

    void set_num_retained(long num_retained);
    long get_num_retained() const;
    std::vector<double> to_principal_space(const std::vector<double> &record) const;
    std::vector<double> to_variable_space(const std::vector<double> &data) const;
    double get_energy() const;
    double get_eigenvalue(long eigen_index) const;
    std::vector<double> get_eigenvalues() const;
    std::vector<double> get_eigenvector(long eigen_index) const;
    std::vector<double> get_principal(long eigen_index) const;
    std::vector<double> get_mean_values() const;
    std::vector<double> get_sigma_values() const;

protected:
    long num_vars_;
    long num_records_;
    long record_buffer_;
    std::string solver_;
    bool do_normalize_;
    long num_retained_;
    arma::Mat<double> data_;
    arma::Col<double> energy_;
    arma::Col<double> eigval_;
    arma::Mat<double> eigvec_;
    arma::Mat<double> proj_eigvec_;
    arma::Mat<double> princomp_;
    arma::Col<double> mean_;
    arma::Col<double> sigma_;
    void initialize_();
    void assert_num_vars_();
    void resize_data_if_needed_();
};