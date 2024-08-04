import pca

pca_inst = pca.pca(2)
pca_inst.add_record([1.0, 1.0])
pca_inst.add_record([2.0, 2.0])
pca_inst.add_record([4.0, 1.0])

pca_inst.solve()

energy = pca_inst.get_energy()
eigenvalues = pca_inst.get_eigenvalues()

print(energy)
print(eigenvalues)
