import sys
# sys.path.append("..")

from utils.utils import get_sum
from utils.class_utils import Encoder, Decoder

print(sys.path)
print(get_sum(1, 2))

encoder = Encoder()
decoder = Decoder()

print(encoder.encode('abcde'))
print(decoder.decode('edcba'))
