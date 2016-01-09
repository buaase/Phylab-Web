import P1041
import unittest 

class test_phylab(unittest.TestCase):
    def testVA_MR_1(self):
        R1 = 469
        R2 = 407
        R_o = 471
        U = [6.9,6.6,6.4,6.1,5.9,5.9,5.6,5.4]
        I = [14.7,14.2,13.7,13.0,12.5,12.3,11.9,11.6]
        res = P1041.VA_MR(R1,R2,R_o,U,I)
        self.assertEqual(res,"(4.5\\pm0.2){\\times}10^{2}","test testVA_MR_1 fail")
    def testMV_1(self):
        R0 = 1149.8
        R1 = 8
        R2 = 9908.1
        d = 50
        U1 = 1.5

        U2 = 1.14
        Rs = 9000
        delta_V = 0.075
        res = P1041.test(R0,R1,R2,U1,delta_V,Rs,U2)
        self.assertEqual(res,"(9908\\pm6) (5.1\\pm0.5){\\times}10^{5}","test testMV_1 fail")

if __name__ =='__main__':
	unittest.main()
