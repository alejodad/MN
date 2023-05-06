import mpmath
import sympy as sp
from math import *

import sys

def FalsaPosicion(a, b, tol, n, f):
    
    x = sp.symbols('x')
    #f = input('Ingresa la función sobre la variable X: ')
    f = sp.lambdify(x, sp.parse_expr(f), "math")
    
    m = a  # Se inicializa m con a para evitar errores de división por cero
    k = 0
    
    if f(a) * f(b) > 0:
        print('La función no cambia de signo en el intervalo. No se puede aplicar el método.')
        return None
    
    while abs(f(m)) > tol and k < n:
        c = a - (f(a)*(b-a))/(f(b)-f(a))  # Se calcula el punto de intersección con el eje x
        if f(a) * f(c) < 0:
            b = c  # Se actualiza el intervalo [a,b]
        else:
            a = c
        m = c  # Se actualiza m con el nuevo punto estimado
        k += 1
        
        print(f'Iteración {k}: Intervalo=[{a:.8f},{b:.8f}], Punto estimado={m:.8f}')
        
    if abs(f(m)) <= tol:
        print(f'Solución encontrada en {k} iteraciones: {m:.8f}')
        return m
    else:
        print(f'El método falló después de {n} iteraciones.')
        return None

'''
El código implementa el método de la Falsa Posición para encontrar una aproximación a la solución de una ecuación no lineal de la forma f(x) = 0. El método se basa en la idea de encontrar un punto de intersección con el eje x mediante la recta que une los puntos (a,f(a)) y (b,f(b)), donde a y b son dos puntos que encierran la solución. En cada iteración se actualiza el intervalo [a,b] y se estima un nuevo punto m, que se convierte en uno de los extremos del intervalo. La función termina cuando se encuentra una aproximación a la solución que cumple con la tolerancia dada o se llega al número máximo de iteraciones permitidas.

El código utiliza la biblioteca SymPy para convertir la expresión de la función f(x) ingresada por el usuario en una función lambda que se puede evaluar numéricamente. Además, se verifica que la función cambie de signo en el intervalo [a,b] para asegurar la existencia de una solución. El código imprime en cada iteración el intervalo actual y el punto estimado de la solución. Si se encuentra una aproximación que cumple con la tolerancia dada, se imprime la solución encontrada y se devuelve como resultado de la función. En caso contrario, se imprime un mensaje indicando que el método falló.
'''

FalsaPosicion(float(sys.argv[1]), float(sys.argv[2]), float(sys.argv[3]), int(sys.argv[4])), str(sys.argv[5])