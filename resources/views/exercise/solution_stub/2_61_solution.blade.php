(require racket/bool)

(define (element-of-set? x set)
  (cond ((null? set) #f)
        ((= x (car set)) #t)
        ((< x (car set)) #f)
        (else (element-of-set? x (cdr set)))))

(define (adjoin-set x set)
  (define (add x set)
    (if (null? set)
        (cons x set)
        (cond ((< x (car set)) (cons x set))
              ((> x (car set)) (cons (car set) (add x (cdr set)))))))
  (if (element-of-set? x set)
      set
      (add x set)))
